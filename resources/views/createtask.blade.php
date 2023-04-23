<!DOCTYPE html>
<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<x-guest-layout>
<p class="mt-2 ml-2">
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
    </p>
<div class="container-fluid mt-5 text-center">
        <p class="mt-5 mb-3"><b>Create new task</b></p>
        <form action="{{ url('/addtask') }}" method="PUT">
            <div class="form-group w-100">
            @csrf
            @method('PUT')
                <input class="mx-1 mt-2 mb-2" type="text" name="name" id="name" placeholder="Name">
                <input class="mx-1 mt-2 mb-2" type="text" name="subject" id="subject" placeholder="Subject">
                <select class="mx-1 mt-2 mb-2" type="text" name="facultytype" id="facultytype">
                    <option value="strucni">Strucni studij</option>
                     <option value="preddiplomski">Preddiplomski studij</option>
                    <option value="diplomski">Diplomski</option>
                </select>
                <input class="mx-1 mt-2 mb-2" type="date" name="created_at" id="created_at" placeholder="Insert Date">
                <button type="submit" class="mx-2 mt-2 mb-2 btn btn-secondary bg-secondary">Add</button>
            </div>
        </form>
</x-guest-layout>
</html>
