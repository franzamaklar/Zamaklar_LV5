<!DOCTYPE html>
<html>

    <head>
    <title>LV5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<x-guest-layout>
    <p class="mt-2 ml-2">
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
    </p>
    <p class="mb-3 mt-5 text-center"><b>MEMBERS</u></b></p>
    <br>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $data)
            @if($data->id != Auth::user()->id)
            <tr>
                <td>{{ $data->id}}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</x-guest-layout>
</html>
