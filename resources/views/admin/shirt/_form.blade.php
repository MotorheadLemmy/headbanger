@csrf
	<div class="form-group">
		<label for="img">Изображение 1</label>
		<img src="{{$news->img ?? '/images/no.png'}}" alt="" style="width:100px">
		<input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
		@error('img')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
		<div class="form-group">
		<label for="img1">Изображение 2</label>
		<img src="{{$shirt->img1 ?? '/images/no.png'}}" alt="" style="width:100px">
		<input type="file" id="img1" name="img1" class="form-control @error('img1') is-invalid @enderror">
		@error('img1')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
		<div class="form-group">
		<label for="img2">Изображение 3</label>
		<img src="{{$shirt->img2 ?? '/images/no.png'}}" alt="" style="width:100px">
		<input type="file" id="img2" name="img2" class="form-control @error('img2') is-invalid @enderror">
		@error('img2')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>



	<div class="form-group">
		<label for="name">Название</label>
		<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$shirt->name ?? '')}}">
		@error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug',$shirt->slug ?? '')}}">
		@error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="description">Описание</label>
		<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description',$shirt->description ?? '')}}</textarea>
		@error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="price">Цена</label>
		<input type="number" step="0.01" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price',$shirt->price ??  '')}}">
		@error('price')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<button class="btn btn-primary">Сохранить</button>