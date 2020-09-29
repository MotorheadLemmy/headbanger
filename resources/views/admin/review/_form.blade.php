@csrf
	<div class="form-group">
		<label for="band"> Группа</label>
		<input type="text" id="band" name="band" class="form-control @error('band') is-invalid @enderror" value="{{old('band',$review->band ?? '')}}">
		@error('band')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="album">Альбом</label>
		<input type="text" id="album" name="album" class="form-control @error('album') is-invalid @enderror" value="{{old('album',$review->album ?? '')}}">
		@error('album')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>


	<div class="form-group">
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug',$review->slug ?? '')}}">
		@error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>

	<div class="form-group">
		<label for="tracklist">Трэклист</label>
		<textarea id="tracklist" name="tracklist" class="form-control @error('tracklist') is-invalid @enderror" >{{old('tracklist',$review->tracklist ?? '')}}</textarea>
		@error('tracklist')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="description">Содержание</label>
		<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description',$review->description ?? '')}}</textarea>
		@error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="img">Обложка альбома</label>
		<img src="{{$review->img ?? '/images/no.png'}}" alt="" style="width:100px">
		<input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
		@error('img')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	<div class="form-group">
		<label for="rating">Оценка</label>
		<input type="text" id="rating" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{old('rating',$review->rating ?? '')}}">
		@error('rating')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
	</div>
	
	<button class="btn btn-primary">Сохранить</button>