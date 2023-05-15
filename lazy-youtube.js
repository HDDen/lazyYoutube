!function(){function e(){
    document.body.addEventListener('click', function(e){
        console.log(e.target, e.currentTarget);

        var evTarget = e.target;
        var classes = evTarget.getAttribute('class');
        if (!classes) return true;

        var targetClassnames = ['youtube-dummy__img', 'youtube-dummy__img-wrapper', 'youtube-dummy'];
        if (targetClassnames.some(function(className){
            return evTarget.classList.contains(className);
        })){
            var parent = evTarget.closest('.youtube-dummy');
            if (!parent) return true;

            if (parent.classList.contains('youtube-dummy__spawned')) return true;
            var videoID = parent.dataset.videoid;

            parent.insertAdjacentHTML('afterbegin', '<iframe width="560" height="315" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen src="https://www.youtube-nocookie.com/embed/'+videoID+'" loading="lazy" class="youtube-dummy__spawned"></iframe>');

            parent.classList.add('youtube-dummy__spawned');
        } else {
            console.log('1');
        }
    });
}"interactive"==document.readyState||"complete"==document.readyState?e():document.addEventListener("DOMContentLoaded",function(){e()})}();
