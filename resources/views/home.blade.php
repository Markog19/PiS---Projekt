<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous">

<script src='https://kit.fontawesome.com/a076d05399.js'></script>



@extends('layouts.app')


@section('content')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <nav class="navbar-light">
                        <p class="navbar-brand">Pregled kategorija</p>

                        <div class=" mx-auto pull-right" id="navbarSupportedContent">
                            <form action="{{ route('home.index') }}" method="GET" role="search" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" name="term" id="term" type="search" placeholder="Pretraži kategoriju" aria-label="Search">
                                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Pretraži</button>
                            </form>
                        </div>
                    </nav>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($categories)
                        @foreach($categories as $category)

                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="{{url('storage/uploads/categories_photos/'.$category->cover_image)}}" style="max-width: 100%;" class="card-img" alt="..." >
                                    </div>
                                    <div class="col-md-8">

                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ url('category/' . $category->id) }}" ><i class="fas fa-folder-open"></i> {{ $category->name }}</a></h5>
                                            @php($count=0)
                                            @foreach($documents as $document)
                                                @if($category->id == $document->category_id)
                                                    @php(++$count)
                                                @endif()
                                            @endforeach



                                            <p class="card-text">Broj dukumenata: {{ $count  }}</p>
                                            <p class="card-text"><small class="text-muted">Zadnji put ažurirano: {{$category->updated_at->diffForHumans()}}</small></p>

                                        </div>
                                        @can('delete-users')

                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="float-right">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <!-- in blade -->
                                                <button type="submit" onclick="return confirm('Jeste li sigurni da želite izbrisati  kategoriju {{$category->name}}?')" class="btn btn-danger" style="margin-left: 5px"><i class="fas fa-folder-minus"></i> Izbriši kategoriju</button>
                                            </form>

                                            <a href="{{ route('categories.edit',$category) }}">
                                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> Uredi kategoriju</button>
                                            </a>

                                        @endcan


                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $categories->links() }}
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
