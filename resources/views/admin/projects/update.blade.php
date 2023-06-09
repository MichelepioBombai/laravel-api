@extends('layouts.app')

<form action="{{ route('admin.projects.update') }}" method="POST">
    @method('PUT')
     @csrf

    <label for="title" class="form-label">title</label>
    <input
        type="text"
        class="form-control"
        id="title"
        name="title"
        value="{{ $project->title }}"
    />

    <label for="slug" class="form-label">slug</label>
    <input
        type="text"
        class="form-control"
        id="slug"
        name="slug"
        value="{{ $project->slug }}"
    />

    <div class="row">
      <div class="col-12"> 
        <label for="category_id" class="form-label">technologies:</label>
        <br>
        @foreach ($technologies as $technology)
        <input type="checkbox" id="technology-{{ $technology->id}}" value="{{ $technology->id}}" name="technologies[]" 
        class="form-check-control" @if (in_array($technology->id, old('technologies', $project_technologies ?? []))) checked @endif> 
        <label for="technology-{{ $technology->id}}">{{ $technology->label}}</label> 
        <br>
        @endforeach
      </div>

    <label for="category_id" class="form-label">Category</label>
    <select class="form-select" name="category_id" id="category_id">
        <option value="{{ $project->category_id}}">Non categorizzato</option>
        @foreach($categories as $category)
          <option @if(old('category_id') ==  $category->id ) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
        @endforeach
      </select>

    <label for="text" class="form-label">text</label>
    <textarea  
    class="form-control" 
    id="text" 
    name="text" 
    value="{{ $project->text }}"  
    rows="5">
    </textarea>
    
    <button type="submit" class="btn btn-primary">Salva</button>
</form>