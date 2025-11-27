<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function analyze(Request $request)
    {
        // Validate upload
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240', // max 10MB
        ]);

        $file = $request->file('resume');

        // Optional: store original file locally (public/storage/uploads)
        $path = $file->store('uploads', 'public');

        // Forward file to Flask backend
        try {
            $response = Http::attach(
                'resume',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            )->post(config('services.ml.endpoint') ?: 'http://127.0.0.1:5000/analyze');

            if (!$response->successful()) {
                Log::error('ML service responded with status '.$response->status(), ['body' => $response->body()]);
                return back()->withErrors(['ml' => 'Failed to analyze resume (ML service error).']);
            }

            $data = $response->json();
        } catch (\Exception $e) {
            Log::error('ML request failed: '.$e->getMessage());
            return back()->withErrors(['ml' => 'Failed to contact ML service.']);
        }

        // Map response keys - we expect:
        // 'resume_text', 'predicted_category', 'scores', 'quality_score', 'quality_breakdown'
        $resumeText = $data['resume_text'] ?? '';
        $predicted = $data['predicted_category'] ?? ($data['category'] ?? 'unknown');
        $scores = $data['scores'] ?? [];
        $quality = $data['quality_score'] ?? null;
        $breakdown = $data['quality_breakdown'] ?? [];

        // Save to DB (optional)
        try {
            Resume::create([
                'filename' => $file->getClientOriginalName(),
                'predicted_category' => $predicted,
                'quality_score' => $quality,
                'quality_breakdown' => $breakdown,
                'scores' => $scores,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save resume to DB: '.$e->getMessage());
            // continue — do not fail user flow
        }

        return view('result', compact('resumeText', 'predicted', 'scores', 'quality', 'breakdown', 'path'));
    }
}
