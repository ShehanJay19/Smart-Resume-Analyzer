@extends('layouts.main')

@section('content')
  <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Upload Resume</h1>

    @if($errors->any())
      <div class="mb-4 text-red-600">
        <ul>
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('resume.analyze') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="resume" required class="mb-4 w-full" />
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Analyze Resume</button>
    </form>
  </div>
@endsection
