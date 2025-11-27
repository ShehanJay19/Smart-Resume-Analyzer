@extends('layouts.main')

@section('content')
  <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Analysis Result</h1>

    <div class="mb-6">
      <div class="text-sm text-gray-600">Predicted category</div>
      <div class="text-xl font-semibold">{{ $predicted }}</div>
    </div>

    <div class="mb-6">
      <div class="text-sm text-gray-600">Quality Score</div>
      <div class="text-3xl font-bold text-green-600">{{ $quality ?? 'N/A' }}%</div>
    </div>

    <div class="mb-6">
      <h3 class="font-semibold mb-2">Category scores</h3>
      <div>
        @foreach($scores as $cat => $prob)
          <div class="mb-2">
            <div class="flex justify-between text-sm">
              <div>{{ $cat }}</div>
              <div>{{ round($prob * 100, 1) }}%</div>
            </div>
            <div class="w-full bg-gray-200 h-2 rounded">
              <div class="bg-blue-500 h-2 rounded" style="width: {{ $prob * 100 }}%"></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="mb-6">
      <h3 class="font-semibold mb-2">Quality breakdown</h3>
      <ul>
        @foreach($breakdown as $k => $v)
          <li class="flex justify-between"><span class="capitalize">{{ str_replace('_', ' ', $k) }}</span><span>{{ $v }}%</span></li>
        @endforeach
      </ul>
    </div>

    <div class="mt-6">
      <a href="{{ url('/') }}" class="text-blue-600">Analyze another resume</a>
    </div>
  </div>
@endsection
