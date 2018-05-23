{{ csrf_field() }}

Title:<br />
<input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" />
<br />

<br />

URL:<br />
<input type="text" name="pretty_url" value="{{ old('pretty_url', $news->pretty_url ?? '') }}" {{ isset($edit) ? 'disabled="disabled' : '' }} />
<br />

<br />

Body:<br />
<textarea name="body">{{ old('body', $news->body ?? '') }}</textarea>
