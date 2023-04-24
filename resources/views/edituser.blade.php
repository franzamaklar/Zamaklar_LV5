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
    <form method="POST" action="{{  route('user.edit') }}" >
    <input type="hidden" name="id" value="{{ $userForNewRole->id }}">
    {{ csrf_field() }}
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Current Role:</th>
                <th scope="col">New Role:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $userForNewRole->role }}</td>
                <td> 
                    <div>
                        <select name="new_role" id="new_role" class="block mt-1 w-full">
                        <option value="Profesor">Profesor</option>
                        <option value="Student">Student</option>
                        </select>
                    </div>
                </td>
            </tr>
        </tbody>
</table>
    <div class="form-group">
                <input type="submit" class="btn btn-primary bg-primary" value="Save">
            </div>
</form>
</x-guest-layout>
</html>
