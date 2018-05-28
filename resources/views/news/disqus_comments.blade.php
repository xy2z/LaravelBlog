{{-- Comments --}}
<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = '{{ URL::route('home') }}';
        this.page.identifier = {{ $id }};
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '{{ env('disqus_url') }}/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
