{{ csrf_field() }}

<label for="form_title">Title</label>
<input type="text" name="title" id="form_title" autofocus value="{{ old('title', $news->title ?? '') }}" />
<br />

<br />

<label for="form_pretty_url">URL</label>
<input type="text" name="pretty_url" id="form_pretty_url" value="{{ old('pretty_url', $news->pretty_url ?? '') }}" {{ isset($edit) ? 'disabled="disabled' : '' }} />
<br />

<br />

<label for="form_pretty_url">Body</label>
<textarea name="body">{{ old('body', $news->body ?? '') }}</textarea>
