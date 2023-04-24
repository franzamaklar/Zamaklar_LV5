<!DOCTYPE html>
<html>
    <head>
    <title>LV5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks overview') }}
        </h2>
        <p class="d-inline font-semibold text-md text-gray-800 leading-tight">
            @csrf
            {{ __('Role: ') }} {{Auth::user()->role}}
            <a href="{{ route('users') }}" class="ml-4 btn btn-secondary p-0" role="button">Show all members</a>
            @if(Auth::user()->role == 'Profesor')
                <a href="{{ route('createtask') }}" class="ml-4 btn btn-light p-0" role="button">Create new task</a>
            @endif
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('updateusers') }}" class="ml-4 btn btn-light p-0" role="button">Update members</a>
            @endif
        </p>
    </x-slot>
    @if(Auth::user()->role == 'Student')
    <div class="container-md mt-5 text-center">
            <p class="mb-3 mt-5 ml-3"><b>TASKS THAT I CAN SIGN UP ON:</b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Profesor ID:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if($task->active == 1 && $task->student_id == null)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                    @foreach($users as $user)
                        @if($task->creator_id == $user->id)
                            <td>{{ $user->id }}</td>
                        @endif
                    @endforeach
                    <td>
                    <form action="{{ url('/edittask') }}" method="PUT">
                    @csrf
                    @method('PUT')
                    <a href="{{ route('task.edit', $task->id) }}" class="ml-4 btn btn-secondary p-0" role="button">Select</a>  
                    </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <p class="mb-3 mt-5 ml-3"><b>TASKS ON REVIEW: </b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Profesor ID:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if($task->active == 1 && $task->student_id == Auth()->user()->id)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                    @foreach($users as $user)
                        @if($task->creator_id == $user->id)
                            <td>{{ $user->id }}</td>
                        @endif
                    @endforeach
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <p class="mb-3 mt-5 ml-3"><b>APPROVED TASKS: </b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Profesor ID:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if($task->active == 0 && $task->student_id == Auth()->user()->id)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                    @foreach($users as $user)
                        @if($task->creator_id == $user->id)
                            <td>{{ $user->id }}</td>
                        @endif
                    @endforeach
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
        @endif
    @if(Auth()->user()->role == 'Profesor')
    <div class="container-md mt-5 text-center">
            <p class="mb-3 mt-5 ml-3"><b>Published tasks that are available:</b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if($task->active == 1 && $task->student_id == null && $task->creator_id == Auth()->user()->id)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <p class="mb-3 mt-5 ml-3"><b>Pending tasks for review:</b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Student ID:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if($task->active == 1 && $task->student_id != null && $task->creator_id == Auth()->user()->id)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                    @foreach($users as $user)
                        @if($task->student_id == $user->id)
                            <td>{{ $user->id }}</td>
                        @endif
                    @endforeach
                    <td>
                    <form action="{{ url('/aceepttask') }}" method="PUT">
                    @csrf
                    @method('PUT')
                    <a href="{{ route('task.aceept', $task->id) }}" class="ml-4 btn btn-secondary p-0" role="button">Aceept</a>  
                    </form>
                    </td>
                    <td>
                    <form action="{{ url('/declinetask') }}" method="PUT">
                    @csrf
                    @method('PUT')
                    <a href="{{ route('task.decline', $task->id) }}" class="ml-4 btn btn-secondary p-0" role="button">Decline</a>  
                    </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <p class="mb-3 mt-5 ml-3"><b>Assigned tasks:</b></p>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name:</th>
                    <th scope="col">Subject:</th>
                    <th scope="col">Faculty type:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Student ID:</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                @if($task->active == 0 && $task->student_id != null && $task->creator_id == Auth()->user()->id)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->subject }}</td>
                    <td>{{ $task->facultytype }}</td>
                    <td>{{ $task->created_at }}</td>
                    @foreach($users as $user)
                        @if($task->student_id == $user->id)
                            <td>{{ $user->id }}</td>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
        @endif
</x-app-layout>
</html>
