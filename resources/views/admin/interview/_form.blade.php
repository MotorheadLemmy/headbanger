@csrf
	<div class="form-group">
		<label for="name">Название</label>
		<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$interview->name ?? '')}}">
		@error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug',$interview->slug ?? '')}}">
		@error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="img">Изображение</label>
		<img src="{{$interview->img ?? '/images/no.png'}}" alt="" style="width:100px">
		<input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
		@error('img')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="description">Содержание</label>
		<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description',$interview->description ?? '')}}</textarea>
		@error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<button class="btn btn-primary">Сохранить</button>