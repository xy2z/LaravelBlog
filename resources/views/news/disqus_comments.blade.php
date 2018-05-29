{{-- Comments --}}
<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = '{{ URL::to('/') . '/news/' . $id }}';
        this.page.identifier = '/news/{{ $id }}';
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '{{ env('DISQUS_URL') }}/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
