@extends('layout')

@section('title', 'Student List')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h1>Student List</h1>
        <a href="{{ url('/students/create') }}" class="btn btn-success">Add New Student</a>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($levels = [1=>'1st Year',2=>'2nd Year',3=>'3rd Year',4=>'4th Year'])
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $levels[$student->year_level] ?? $student->year_level }}</td>
                    <td class="action-links">
                        <x-view-button :url="url('/students/'.$student->id)" />
                        <x-edit-button :url="url('/students/'.$student->id.'/edit')" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
