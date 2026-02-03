@extends('layout')

@section('title', 'Add Student')

@section('content')
<div class="card">
    <h1>Add New Student</h1>
    
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter student full name" value="{{ old('fullname') }}" required>
            @error('fullname') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter student email" value="{{ old('email') }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="course" class="form-label">Course</label>
            <select id="course" name="course" class="form-control" required>
                <option value="">Select a course</option>
                <option value="Computer Science" {{ old('course')==='Computer Science' ? 'selected' : '' }}>Computer Science</option>
                <option value="Information Technology" {{ old('course')==='Information Technology' ? 'selected' : '' }}>Information Technology</option>
                <option value="Information Systems" {{ old('course')==='Information Systems' ? 'selected' : '' }}>Information Systems</option>
                <option value="Computer Engineering" {{ old('course')==='Computer Engineering' ? 'selected' : '' }}>Computer Engineering</option>
            </select>
            @error('course') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="year_level" class="form-label">Year Level</label>
            <select id="year_level" name="year_level" class="form-control" required>
                <option value="">Select year level</option>
                <option value="1" {{ old('year_level')=='1' ? 'selected' : '' }}>1st Year</option>
                <option value="2" {{ old('year_level')=='2' ? 'selected' : '' }}>2nd Year</option>
                <option value="3" {{ old('year_level')=='3' ? 'selected' : '' }}>3rd Year</option>
                <option value="4" {{ old('year_level')=='4' ? 'selected' : '' }}>4th Year</option>
            </select>
            @error('year_level') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-success">Add Student</button>
            <a href="{{ url('/students') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
