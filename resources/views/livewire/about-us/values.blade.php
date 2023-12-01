<div class="z-10 relative w-full h-[100vh] overflow-y-auto">
    <div id="pagepiling">
        <div class="section relative grid grid-cols-12 grid-rows-6 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[100vh] bg-about_us_10_mb sm:bg-about_us_10 bg-center bg-cover bg-no-repeat"></div>

            <div class="w-full z-10 px-4 xl:p-0 absolute top-[30%] sm:top-[50%]">
                <h3 class="text-center text-2xl sm:text-4xl xl:text-6xl font-bold leading-10 xl:leading-[124px] tracking-[0px] text-white mb-3">Uniqueness, Integrity, Environment and Respect.</h3>
                <p class="text-center text-lg sm:text-3xl xl:text-5xl xl:leading-[1px] tracking-[0px] text-white">Our values are clear and govern our work.</p>
            </div>
        </div>

        @foreach ($slides as $slide )
            <x-slide_values :slide="$slide" />
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.min.js"
            integrity="sha512-FcXc9c211aHVJEHxoj2fNFeT8+wUESf/4mUDIR7c31ccLF3Y6m+n+Wsoq4dp2sCnEEDVmjhuXX6TfYNJO6AG6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.js"
            integrity="sha512-5d8vqNar4es3c5P8GOy4SzaFJKEIIjDJhoaO/akcn/u+Ynj5gukMF7FgG1AEAPSIDVjEeFh+dpT6j42s6vxCkg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#pagepiling').pagepiling({
                menu: null,
                direction: 'vertical',
                verticalCentered: false,
                sectionsColor: [],
                anchors: [],
                scrollingSpeed: 700,
                easing: 'swing',
                loopBottom: false,
                loopTop: false,
                css3: true,
                navigation: false,
                normalScrollElements: null,
                normalScrollElementTouchThreshold: 5,
                touchSensitivity: 5,
                keyboardScrolling: true,
                sectionSelector: '.section',
                animateAnchor: false,

                //events
                onLeave: function(index, nextIndex, direction){},
                afterLoad: function(anchorLink, index){},
                afterRender: function(){},
            });
        });
    </script>

    <script>
        var action = document.getElementsByClassName('action');

        window.onscroll = function(e) {
            if (this.oldScroll > this.scrollY) {
                for (let i = 0; i < action.length; i++) {
                    action[i].classList.remove("pt-[135px]", "xl:pt-[50px]");
                }
            } else {
                for (let i = 0; i < action.length; i++) {
                    action[i].classList.add("pt-[135px]", "xl:pt-[50px]");
                }
            }
            this.oldScroll = this.scrollY;
        }
    </script>
@endpush
