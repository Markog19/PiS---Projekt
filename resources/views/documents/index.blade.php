@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar-light">
                       <div class="row" style="margin-left: 10px">
                           <p class="navbar-brand">Pregled kategorije "{{ $category->name }}"</p>

                            <div class=" mx-auto pull-right" id="navbarSupportedContent">
                                <form action="{{ url('category/' . $category->id) }}" method="GET" role="search" class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" name="term" id="term" type="search" placeholder="Pretraži dokument" aria-label="Search">
                                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Pretraži</button>
                                </form>
                            </div>
                       </div>
                    </nav>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @foreach($files as $file)
                            @if($category->id == $file->category_id)

                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-3">
                                                <p><b>Naslov dokumenta:</b></p>
                                            </div>
                                            <div class="col-4">
                                                {{$file->doc_name}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <p><b>Objavio korisnik: </b></p>
                                            </div>
                                            <div class="col-3">
                                                {{ $file->user_name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <p><b>Dokument:</b> </p>
                                            </div>
                                            <div class="col-6">
                                                {{$file->doc_file}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <p><b>Format dokumenta:</b></p>
                                            </div>
                                            <div class="col-6">
                                                @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'pdf')
                                                    .pdf <img src="{{url('storage/uploads/icons/pdf.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'doc')
                                                        .doc <img src="{{url('storage/uploads/icons/word.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'docx')
                                                        .docx <img src="{{url('storage/uploads/icons/docx.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'txt')
                                                        .txt <img src="{{url('storage/uploads/icons/txt.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'csv')
                                                        .csv <img src="{{url('storage/uploads/icons/csv.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'ppt')
                                                        .ppt <img src="{{url('storage/uploads/icons/ppt.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'pptx')
                                                        .pptx <img src="{{url('storage/uploads/icons/pptx.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                                    @if (pathinfo($file->doc_file, PATHINFO_EXTENSION) == 'xlsx')
                                                        .xlsx <img src="{{url('storage/uploads/icons/xlsx.png')}}" style="height: 30px; width: 30px;" alt=".." >
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <p><b>Datum objave:</b></p>
                                            </div>
                                            <div class="col-6">
                                                {{ Carbon\Carbon::parse($file->created_at)->format('m.d.Y H:i') }}
                                            </div>
                                        </div>

                                        <hr>
                                        <a download href="{{url('storage/uploads/documents/'.$file->doc_file)}}" class="btn btn-primary"><i class="far fa-save"></i> Preuzmi dokument</a>
                                        @can('delete-users')

                                            <form action="{{ route('documents.destroy', $file) }}" method="POST" class="float-right">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <!-- in blade -->
                                                <button type="submit" onclick="return confirm('Jeste li sigurni da želite izbrisati  dokument {{$file->doc_name}}?')" class="btn btn-danger" style="margin-left: 5px"><i class="far fa-trash-alt"></i> Izbriši dokument</button>
                                            </form>
                                            @endcan
                                    </div>
                                </div>

                            @endif
                                <br>
                        @endforeach
                        {{ $files->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
