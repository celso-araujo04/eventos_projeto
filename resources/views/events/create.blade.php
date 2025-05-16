@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ old('city') }}">
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0" {{ old('private') == '0' ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('private') == '1' ? 'selected' : '' }}>Sim</option>
            </select>
            @error('private')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="items">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras" {{ is_array(old('items')) && in_array('Cadeiras', old('items')) ? 'checked' : '' }}> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco" {{ is_array(old('items')) && in_array('Palco', old('items')) ? 'checked' : '' }}> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis" {{ is_array(old('items')) && in_array('Cerveja Gratis', old('items')) ? 'checked' : '' }}> Cerveja Gratis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food" {{ is_array(old('items')) && in_array('Open Food', old('items')) ? 'checked' : '' }}> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes" {{ is_array(old('items')) && in_array('Brindes', old('items')) ? 'checked' : '' }}> Brindes
            </div>
            @error('items')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection