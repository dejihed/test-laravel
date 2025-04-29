@extends('template')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modifier une tâche</p>
        </header>

        <div class="card-content">
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="title">Titre</label>
                    <div class="control">
                        <input class="input" type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <textarea class="textarea" name="description" id="description" required>{{ old('description', $task->description) }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="is_completed" value="1"
                            {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                        Tâche complétée
                    </label>
                </div>

                <div class="field is-grouped mt-4">
                    <div class="control">
                        <button class="button is-link" type="submit">Mettre à jour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
