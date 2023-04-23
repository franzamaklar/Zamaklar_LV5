<!DOCTYPE html>
<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<x-guest-layout>
    <p class="mt-2 ml-2">
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
    </p>
    <p class="mb-3 mt-5 text-center"><b>MEMBERS</u></b></p>
    <br>
    <div class="container-md mt-5 text-center">
    <form action="{{ url('/updaterole') }}" method="PUT">
        @csrf
                    @method('PUT')
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Current Role</th>
                <th scope="col">New Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($updateUsers as $data)
            @if($data->id != Auth::user()->id && $data->role != 'admin')
            <tr>
                <td>{{ $data->id}}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->role }}</td>
                <td> 
                    <div>
                        <select name="new_role" id="new_role" class="block mt-1 w-full">
                        <option value="Profesor">Profesor</option>
                        <option value="Student">Student</option>
                        </select>
                    </div>
                </td>
                <td>
                    <a href="{{ route('user.update', $data->id) }}" class="ml-4 btn btn-secondary p-0" role="button">Update</a>  
                    </td>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    </form>
</div>
</x-guest-layout>
</html>