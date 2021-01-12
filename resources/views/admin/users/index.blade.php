@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Korisnici</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Uloga</th>
                                <th scope="col">Operacija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ',  $user->roles()->get()->pluck('name')->toArray() )}}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                                <button type="button" class="btn btn-primary float-left"><i class="fas fa-user-edit"></i> Uredi</button>
                                        @endcan

                                        @can('delete-users')

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <!-- in blade -->
                                            <button type="submit" onclick="return confirm('Jeste li sigurni da želite izbrisati korisnika {{ $user->name }}?')" class="btn btn-danger" style="margin-left: 5px"><i class="fas fa-user-times"></i> Izbriši</button>
                                        </form>
                                            @endcan
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
