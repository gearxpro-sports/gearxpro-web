@props(['name'])

@switch($name)
    @case('agenda')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24"
             viewBox="0 0 12.605 12.604" {{ $attributes->merge(['class']) }}>
            <path
                d="M3.428 12.604a1.99 1.99 0 0 1-1.99-1.983v-.887H.55a.55.55 0 0 1-.55-.55.551.551 0 0 1 .55-.551h.888V6.857H.55a.55.55 0 0 1-.55-.55.55.55 0 0 1 .55-.55h.888V3.98H.55A.55.55 0 0 1 0 3.43a.55.55 0 0 1 .55-.55h.888v-.888A1.99 1.99 0 0 1 3.428 0h7.19a1.99 1.99 0 0 1 1.988 1.988v8.628a1.99 1.99 0 0 1-1.988 1.988Zm-.888-1.988a.89.89 0 0 0 .888.888h7.19a.89.89 0 0 0 .888-.888V1.988a.89.89 0 0 0-.888-.888h-7.19a.89.89 0 0 0-.888.888v.888h.169a.55.55 0 0 1 .55.55.55.55 0 0 1-.55.55H2.54v1.777h.169a.55.55 0 0 1 .55.55.55.55 0 0 1-.55.55H2.54v1.776h.169a.551.551 0 0 1 .55.551.55.55 0 0 1-.55.55H2.54Zm2.326-.887a.55.55 0 0 1-.55-.55.55.55 0 0 1 .55-.551H9.18a.55.55 0 0 1 .55.551.55.55 0 0 1-.55.55Zm.169-4.145a1.99 1.99 0 0 1 1.987-1.988A1.99 1.99 0 0 1 9.01 5.584a1.99 1.99 0 0 1-1.988 1.988 1.99 1.99 0 0 1-1.988-1.989Zm1.1 0a.889.889 0 0 0 .887.888.889.889 0 0 0 .888-.888.889.889 0 0 0-.888-.888.889.889 0 0 0-.888.887Z"/>
        </svg>
        @break
    @case('bell')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16.123" height="18.004"
             viewBox="0 0 16.123 18.004" {{ $attributes->merge(['class']) }}>
            <path
                d="M4.7 14.643v-.4H.541a.541.541 0 0 1-.267-1.011 3.231 3.231 0 0 0 1.606-2.384V8.037a7.106 7.106 0 0 1 3.784-5.962 2.421 2.421 0 0 1 4.792 0 7.1 7.1 0 0 1 3.785 5.962v2.811a3.231 3.231 0 0 0 1.606 2.384.541.541 0 0 1-.267 1.011h-4.16v.4a3.361 3.361 0 0 1-6.722 0Zm1.081 0a2.28 2.28 0 0 0 4.56 0v-.4h-4.56Zm.94-12.232a.469.469 0 0 1-.005.085.522.522 0 0 1-.077.212.53.53 0 0 1-.167.169.474.474 0 0 1-.071.038 6.029 6.029 0 0 0-3.44 5.16v2.807a.561.561 0 0 1 0 .065 4.312 4.312 0 0 1-.95 2.215h12.105a4.312 4.312 0 0 1-.95-2.215.562.562 0 0 1 0-.065V8.074a6.028 6.028 0 0 0-3.45-5.165.541.541 0 0 1-.31-.489 1.34 1.34 0 0 0-2.68-.01Z"/>
        </svg>
        @break
    @case('billing')
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="15.3" height="19.3"
             viewBox="0 0 15.3 19.3" {{ $attributes->merge(['class']) }}>
            <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3">
                <path d="M9.65.65v4a1 1 0 0 0 1 1h4"/>
                <path d="M12.65 18.65h-10a2 2 0 0 1-2-2v-14a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                <path d="M7.65 11.65h-3"/>
                <path d="M9.65 8.822a3 3 0 1 0 0 5.656"/>
            </g>
        </svg>
        @break
    @case('box')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="12.707" height="12.646"
             viewBox="0 0 12.707 12.646" {{ $attributes->merge(['class']) }}>
            <path
                d="M6.179 12.613.541 10.358a.855.855 0 0 1-.542-.8v-6.8a.464.464 0 0 1 .293-.433l5.6-2.238a1.247 1.247 0 0 1 .464-.09 1.248 1.248 0 0 1 .465.09l5.594 2.238a.463.463 0 0 1 .294.433v6.8a.855.855 0 0 1-.541.8l-5.639 2.255a.461.461 0 0 1-.173.034.466.466 0 0 1-.177-.034Zm-5.244-3.1 4.951 1.981V5.437L.935 3.457Zm5.886-4.076v6.056l4.951-1.981V3.457ZM4.669 3.943l1.684.674 4.628-1.851-1.685-.673ZM6.235.962l-4.51 1.8 1.685.674 4.628-1.851L6.472.959a.324.324 0 0 0-.118-.022.324.324 0 0 0-.119.021Z"/>
        </svg>
        @break
    @case('boxes')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="14.003" height="14.003"
             viewBox="0 0 14 14" {{ $attributes->merge(['class']) }}>
            <path
                d="M6.785.058a.438.438 0 0 1 .434 0L10.5 1.934a.438.438 0 0 1 .221.38v3.5l3.061 1.75a.438.438 0 0 1 .218.374v3.751a.438.438 0 0 1-.221.38L10.5 13.945a.438.438 0 0 1-.434 0L7 12.194l-3.063 1.752a.438.438 0 0 1-.434 0L.221 12.07A.438.438 0 0 1 0 11.69V7.939a.438.438 0 0 1 .221-.38L3.282 5.81v-3.5a.438.438 0 0 1 .221-.38ZM3.72 6.568l-2.4 1.371 2.4 1.371 2.4-1.371Zm2.844 2.126-2.407 1.375v2.743l2.407-1.375Zm.875 2.743 2.407 1.375v-2.743L7.439 8.694Zm.445-3.5 2.4 1.371 2.4-1.371-2.4-1.371-2.4 1.371ZM9.846 5.81V3.067L7.439 4.443v2.743ZM6.564 7.186V4.443L4.157 3.067V5.81ZM4.6 2.313 7 3.685l2.4-1.372L7 .942Zm8.526 6.38-2.407 1.375v2.743l2.407-1.375Zm-9.844 4.118v-2.742L.875 8.694v2.743Z"/>
        </svg>
        @break
    @case('calendar')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="15" height="15"
             viewBox="0 0 15 15" {{ $attributes->merge(['class']) }}>
            <path
                d="M2.143 15A2.145 2.145 0 0 1 0 12.857V3.673A2.145 2.145 0 0 1 2.143 1.53h.918V.612A.613.613 0 0 1 3.673 0a.612.612 0 0 1 .612.612v.918h4.9V.612A.612.612 0 0 1 9.797 0a.612.612 0 0 1 .611.612v.918h.918a2.146 2.146 0 0 1 2.143 2.143v9.184A2.145 2.145 0 0 1 11.326 15Zm-.919-2.143a.92.92 0 0 0 .919.919h9.183a.92.92 0 0 0 .918-.919v-5.51H1.223Zm11.021-6.735V3.673a.919.919 0 0 0-.918-.918h-.918v.918a.612.612 0 0 1-.611.613.612.612 0 0 1-.612-.613v-.918h-4.9v.918a.612.612 0 0 1-.612.613.613.613 0 0 1-.612-.613v-.918h-.918a.92.92 0 0 0-.919.918v2.449Z"/>
        </svg>
        @break
    @case('cart')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13.755" height="13.756"
             viewbox="0 0 13.755 13.756" {{ $attributes->merge(['class']) }}>
            <path
                d="M9.041 11.851a1.908 1.908 0 0 1 1.07-1.712h-4.66a1.907 1.907 0 0 1 1.069 1.712 1.906 1.906 0 0 1-1.9 1.905 1.906 1.906 0 0 1-1.9-1.905 1.907 1.907 0 0 1 1.069-1.712H3.72a.548.548 0 0 1-.538-.448L1.827 2.474l-.343-1.377H.555A.548.548 0 0 1 .007.548a.549.549 0 0 1 .548-.549h1.357a.548.548 0 0 1 .532.416l.348 1.393h10.422a.545.545 0 0 1 .424.2.544.544 0 0 1 .114.456l-.9 4.521a.549.549 0 0 1-.51.44l-8.387.421.225 1.2h7.683a.549.549 0 0 1 .548.549.548.548 0 0 1-.548.549h-.069a1.907 1.907 0 0 1 1.069 1.712 1.906 1.906 0 0 1-1.9 1.905 1.907 1.907 0 0 1-1.922-1.91Zm1.1 0a.809.809 0 0 0 .808.808.808.808 0 0 0 .807-.808.808.808 0 0 0-.807-.807.809.809 0 0 0-.811.807Zm-6.33 0a.809.809 0 0 0 .808.808.809.809 0 0 0 .808-.808.809.809 0 0 0-.808-.807.809.809 0 0 0-.81.807Zm-.069-5.093 8.109-.407.689-3.445H3.019Z"/>
        </svg>
        @break
    @case('check')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="9.023" height="6.782" viewbox="0 0 9.023 6.782" {{ $attributes->merge(['class']) }}>
            <path d="M3.341 6.682a1 1 0 0 1-.707-.293L.293 4.048a1 1 0 0 1 1.414-1.414l1.634 1.634L7.316.293A1 1 0 0 1 8.73 1.707L4.048 6.389a1 1 0 0 1-.707.293Z"/>
        </svg>
        @break
    @case('chevron-down')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.08" height="5.5" viewbox="0 0 10.08 5.5" {{ $attributes->merge(['class']) }}>
            <path d="M4.608 5.325.174 1a.581.581 0 0 1 0-.829.6.6 0 0 1 .838 0L5.039 4.1 9.068.171a.6.6 0 0 1 .837 0 .58.58 0 0 1 0 .831L5.471 5.325a.618.618 0 0 1-.863 0Z"/>
        </svg>
        @break
    @case('chevron-left')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="5.5" height="10" viewbox="0 0 5.5 10" {{ $attributes->merge(['class']) }}>
            <path d="m4.464 9.828-4.291-4.4a.607.607 0 0 1 0-.85l4.291-4.4a.574.574 0 0 1 .409-.173.575.575 0 0 1 .41.173.588.588 0 0 1 0 .824l-3.9 4 3.9 4a.594.594 0 0 1 0 .825.575.575 0 0 1-.41.173.574.574 0 0 1-.409-.172Z"/>
        </svg>
        @break
    @case('chevron-right')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="5.5" height="10" viewbox="0 0 5.5 10" {{ $attributes->merge(['class']) }}>
            <path d="m.988.172 4.291 4.4a.607.607 0 0 1 0 .85l-4.291 4.4a.574.574 0 0 1-.409.173.575.575 0 0 1-.41-.173.588.588 0 0 1 0-.824l3.9-4-3.9-4a.594.594 0 0 1 0-.825A.575.575 0 0 1 .579 0a.574.574 0 0 1 .409.172Z"/>
        </svg>
        @break
    @case('chevron-up')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.1" height="5.5" viewbox="0 0 10.1 5.5" {{ $attributes->merge(['class']) }}>
            <path d="M5.471.175 9.906 4.5a.581.581 0 0 1 0 .829.6.6 0 0 1-.838 0L5.041 1.4 1.012 5.329a.6.6 0 0 1-.837 0 .581.581 0 0 1 0-.831L4.609.175a.618.618 0 0 1 .862 0Z"/>
        </svg>
        @break
    @case('circle-w-check')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="19.946" height="20" viewbox="0 0 19.946 20" {{ $attributes->merge(['class']) }}>
            <path d="M2.948 17.09a10 10 0 0 1-2.2-10.88 10 10 0 0 1 9.2-6.209 10.6 10.6 0 0 1 2.371.279 1 1 0 0 1 .779.683 1 1 0 0 1-.244 1.007 1 1 0 0 1-1.006.251A8.726 8.726 0 0 0 9.948 2a7.93 7.93 0 0 0-5.669 2.361 8 8 0 0 0-1.711 8.71 8 8 0 0 0 7.381 4.928 8 8 0 0 0 8-8 1 1 0 0 1 1-1 1 1 0 0 1 1 1 10 10 0 0 1-10 10 9.932 9.932 0 0 1-7.001-2.909Zm6.289-3.38-3-3a1.006 1.006 0 0 1 0-1.42 1 1 0 0 1 1.42 0l2.29 2.249 6.222-7.2a1 1 0 0 1 1.381-.059 1 1 0 0 1 .117 1.379l-7 8a1 1 0 0 1-.722.338h-.006a1.008 1.008 0 0 1-.702-.287Z"/>
        </svg>
        @break
    @case('clock')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="12.855" height="12.855" viewbox="0 0 12.855 12.855" {{ $attributes->merge(['class']) }}>
            <path d="M1.882 10.973A6.386 6.386 0 0 1 0 6.431 6.436 6.436 0 0 1 6.428.003a6.436 6.436 0 0 1 6.428 6.428 6.434 6.434 0 0 1-6.428 6.428 6.4 6.4 0 0 1-4.546-1.886Zm-.881-4.549a5.393 5.393 0 0 0 1.59 3.84 5.389 5.389 0 0 0 3.837 1.587 5.432 5.432 0 0 0 5.428-5.427A5.434 5.434 0 0 0 6.428.997 5.431 5.431 0 0 0 1 6.424ZM7.329 8.68 6.011 6.705a.5.5 0 0 1-.083-.291v-3.28a.5.5 0 0 1 .5-.5.5.5 0 0 1 .5.5v3.143l1.232 1.85a.5.5 0 0 1-.14.692.5.5 0 0 1-.274.086.5.5 0 0 1-.417-.224Z"/>
        </svg>
        @break
    @case('credit-card')
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="19.3" height="15.3" viewBox="0 0 19.3 15.3" {{ $attributes->merge(['class']) }}>
            <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3">
                <path d="M.65.65v3a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-12a3 3 0 0 1-3-3Z"/>
                <path d="M.65 5.65h18"/>
                <path d="M4.65 10.65h.01"/>
                <path d="M8.65 10.65h2"/>
            </g>
        </svg>
        @break
    @case('user-data')
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="21.924" height="21.924" viewBox="0 0 21.924 21.924" {{ $attributes->merge(['class']) }}>
            <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6">
                <path d="M10.962 10.962H.8A10.162 10.162 0 1 0 10.962.8 10.162 10.162 0 0 0 .8 10.962"/>
                <path d="M10.962 8.703H7.575a3.387 3.387 0 1 0 3.387-3.387 3.387 3.387 0 0 0-3.387 3.387"/>
                <path d="M4.377 18.696a4.516 4.516 0 0 1 4.327-3.217h4.516a4.516 4.516 0 0 1 4.329 3.224"/>
            </g>
        </svg>
    @break
    @case('user-w-search')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13.668" height="12.998" viewBox="0 0 13.668 12.998" {{ $attributes->merge(['class']) }}>
            <path d="M5.363 6.033a4.808 4.808 0 0 0-.543 1.294c-1.8.154-3.546 1-3.546 1.388v.737h3.552a4.665 4.665 0 0 0 .536 1.274H0V8.714c0-1.783 3.573-2.681 5.363-2.681m0-6.033a2.681 2.681 0 0 1 2.681 2.681 2.709 2.709 0 0 1-.55 1.629 4.259 4.259 0 0 0-1.522.985l-.61.067A2.681 2.681 0 1 1 5.363 0m0 1.274a1.408 1.408 0 1 0 1.408 1.408 1.408 1.408 0 0 0-1.408-1.408M9.05 5.363a3.019 3.019 0 0 1 2.55 4.625l2.065 2.078-.929.934-2.091-2.06a3.017 3.017 0 1 1-1.6-5.577m0 1.341a1.676 1.676 0 1 0 1.676 1.676A1.676 1.676 0 0 0 9.05 6.7Z"/>
        </svg>
    @break
    @case('download')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="9.563" height="10" viewBox="0 0 9.563 10" {{ $attributes->merge(['class']) }}>
            <path d="M1.489 10A1.489 1.489 0 0 1 0 8.514v-1.08a.408.408 0 0 1 .408-.405.406.406 0 0 1 .405.405v1.08a.676.676 0 0 0 .676.675h6.485a.677.677 0 0 0 .679-.675v-1.08a.4.4 0 0 1 .4-.405.407.407 0 0 1 .405.405v1.08A1.488 1.488 0 0 1 7.97 10ZM4.73 7.3H4.63a.405.405 0 0 1-.184-.1l-2.7-2.7a.405.405 0 0 1 0-.573.407.407 0 0 1 .574 0l2.009 2.012V.429a.406.406 0 0 1 .405-.405.407.407 0 0 1 .407.405v5.507l2.01-2.009a.406.406 0 0 1 .573 0 .405.405 0 0 1 0 .573l-2.7 2.7a.411.411 0 0 1-.248.116h-.042Z"/>
        </svg>
    @break
    @case('edit')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="11.5" height="11.5" viewBox="0 0 11.5 11.5" {{ $attributes->merge(['class']) }}>
            <path d="M11.04 10.407H.46a.46.46 0 0 0-.46.46v.517a.115.115 0 0 0 .115.115h11.27a.115.115 0 0 0 .115-.115v-.517a.46.46 0 0 0-.46-.46ZM2.094 9.2a.582.582 0 0 0 .086-.007l2.418-.424a.141.141 0 0 0 .076-.04l6.094-6.094a.143.143 0 0 0 0-.2L8.379.041a.146.146 0 0 0-.2 0L2.081 6.135a.146.146 0 0 0-.04.076l-.424 2.418a.482.482 0 0 0 .132.428.487.487 0 0 0 .342.142Zm.969-2.507 5.214-5.212 1.054 1.054-5.214 5.214-1.278.226Z"/>
        </svg>
        @break
    @case('eye')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="17" height="12" viewBox="0 0 17 12" {{ $attributes->merge(['class']) }}>
            <path d="M.093 5.984a.651.651 0 0 1 0-.669C2.209 1.788 4.92 0 8.15 0s5.942 1.788 8.058 5.315a.651.651 0 0 1 0 .669c-2.116 3.527-4.827 5.315-8.058 5.315S2.209 9.512.093 5.984Zm4.293-3.543a10.584 10.584 0 0 0-2.972 3.208 10.587 10.587 0 0 0 2.972 3.209A6.674 6.674 0 0 0 8.15 10a6.675 6.675 0 0 0 3.765-1.141 10.6 10.6 0 0 0 2.973-3.209 10.6 10.6 0 0 0-2.973-3.208A6.675 6.675 0 0 0 8.15 1.301a6.674 6.674 0 0 0-3.764 1.14Zm1.447 3.208a2.32 2.32 0 0 1 2.318-2.317 2.32 2.32 0 0 1 2.317 2.317 2.32 2.32 0 0 1-2.317 2.318A2.32 2.32 0 0 1 5.833 5.65Zm1.3 0A1.018 1.018 0 0 0 8.15 6.666a1.018 1.018 0 0 0 1.016-1.017A1.018 1.018 0 0 0 8.15 4.633 1.018 1.018 0 0 0 7.133 5.65Z"/>
        </svg>
        @break
    @case('eye-off')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="17.371" height="17.345" viewBox="0 0 17.371 17.345" {{ $attributes->merge(['class']) }}>
            <path stroke="rgba(0,0,0,0)" d="m15.749 16.654-3.276-3.274a7.935 7.935 0 0 1-3.742.958H8.68c-3.234 0-5.953-1.794-8.076-5.33a.656.656 0 0 1-.011-.651 11.993 11.993 0 0 1 3.2-3.662L.707 1.609a.648.648 0 0 1 0-.918.648.648 0 0 1 .918 0L16.67 15.734a.649.649 0 0 1 0 .92.646.646 0 0 1-.46.191.642.642 0 0 1-.461-.191ZM1.92 8.664c1.868 2.957 4.116 4.356 6.807 4.374a6.636 6.636 0 0 0 2.788-.618l-1.719-1.717a2.3 2.3 0 0 1-1.119.3h-.018a2.3 2.3 0 0 1-1.638-.692 2.3 2.3 0 0 1-.668-1.646 2.3 2.3 0 0 1 .3-1.1l-1.94-1.94A10.665 10.665 0 0 0 1.92 8.664Zm5.734.011a1.018 1.018 0 0 0 .294.724 1.023 1.023 0 0 0 .719.306 1.1 1.1 0 0 0 .108-.022l-1.1-1.1c-.003.029-.017.059-.017.092Zm6.325 2.873a.649.649 0 0 1-.033-.918 13.185 13.185 0 0 0 1.5-1.956c-1.857-2.938-4.071-4.366-6.761-4.366a7.252 7.252 0 0 0-1.394.137.653.653 0 0 1-.768-.508.653.653 0 0 1 .509-.767 8.992 8.992 0 0 1 1.654-.162c3.237 0 5.957 1.792 8.079 5.33a.651.651 0 0 1 0 .665 14.561 14.561 0 0 1-1.872 2.511.644.644 0 0 1-.476.208.642.642 0 0 1-.438-.174Z"/>
        </svg>
        @break
    @case('filter')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="9.558" height="10" viewBox="0 0 9.558 10" {{ $attributes->merge(['class']) }}>
            <path d="M.39 0h8.677a.39.39 0 0 1 .39.39v1.178a1.465 1.465 0 0 1-.432 1.043l-2.28 2.28v3.635a.39.39 0 0 1-.267.37L3.225 9.98a.39.39 0 0 1-.513-.37V5.151L.383 2.59A1.472 1.472 0 0 1 0 1.6V.39A.39.39 0 0 1 .39 0Zm8.287.78H.78v.82a.693.693 0 0 0 .181.467L3.39 4.738a.39.39 0 0 1 .1.262v4.069l2.474-.825V4.729a.39.39 0 0 1 .114-.276l2.394-2.394a.7.7 0 0 0 .2-.491Z"/>
        </svg>
        @break
    @case('gear')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13.5" height="13.5" viewBox="0 0 13.5 13.5" {{ $attributes->merge(['class']) }}>
            <path d="M4.9 11.8a.6.6 0 0 0-.353-.413.6.6 0 0 0-.541.042 1.708 1.708 0 0 1-.888.256 1.716 1.716 0 0 1-1.487-.887 1.669 1.669 0 0 1 .039-1.7.6.6 0 0 0 .042-.541.6.6 0 0 0-.412-.353A1.673 1.673 0 0 1 0 6.553a1.675 1.675 0 0 1 1.3-1.651.6.6 0 0 0 .412-.353.6.6 0 0 0-.042-.541 1.667 1.667 0 0 1-.039-1.7 1.714 1.714 0 0 1 1.487-.887 1.715 1.715 0 0 1 .887.255.586.586 0 0 0 .311.089.6.6 0 0 0 .582-.459 1.675 1.675 0 0 1 1.651-1.3 1.674 1.674 0 0 1 1.651 1.3.6.6 0 0 0 .353.412.6.6 0 0 0 .541-.042 1.719 1.719 0 0 1 .888-.256 1.716 1.716 0 0 1 1.487.887 1.667 1.667 0 0 1-.039 1.7.6.6 0 0 0-.042.541.6.6 0 0 0 .412.353 1.675 1.675 0 0 1 1.3 1.651 1.673 1.673 0 0 1-1.3 1.651.6.6 0 0 0-.413.353.6.6 0 0 0 .042.541 1.669 1.669 0 0 1 .04 1.7 1.718 1.718 0 0 1-1.488.887 1.716 1.716 0 0 1-.887-.256.6.6 0 0 0-.541-.042.6.6 0 0 0-.353.412 1.674 1.674 0 0 1-1.651 1.3A1.675 1.675 0 0 1 4.9 11.8Zm.068-1.429a1.7 1.7 0 0 1 1 1.17.578.578 0 0 0 .582.457.577.577 0 0 0 .581-.458 1.707 1.707 0 0 1 1-1.168 1.7 1.7 0 0 1 .651-.13 1.7 1.7 0 0 1 .884.248.6.6 0 0 0 .315.095.624.624 0 0 0 .528-.325.558.558 0 0 0-.02-.593 1.707 1.707 0 0 1-.119-1.535 1.706 1.706 0 0 1 1.17-1 .577.577 0 0 0 .457-.581.578.578 0 0 0-.458-.582 1.707 1.707 0 0 1-1.168-1 1.706 1.706 0 0 1 .119-1.535.558.558 0 0 0 .02-.593.624.624 0 0 0-.528-.325.6.6 0 0 0-.315.094 1.7 1.7 0 0 1-.885.248 1.686 1.686 0 0 1-.651-.13 1.706 1.706 0 0 1-1-1.169.577.577 0 0 0-.581-.458.578.578 0 0 0-.582.458 1.7 1.7 0 0 1-1.651 1.3 1.7 1.7 0 0 1-.883-.248.6.6 0 0 0-.316-.1.624.624 0 0 0-.528.325.559.559 0 0 0 .02.594 1.7 1.7 0 0 1 .119 1.535 1.7 1.7 0 0 1-1.169 1 .578.578 0 0 0-.458.582.577.577 0 0 0 .458.581 1.705 1.705 0 0 1 1.168 1 1.7 1.7 0 0 1-.119 1.534.56.56 0 0 0-.02.593.625.625 0 0 0 .528.326.6.6 0 0 0 .316-.1 1.7 1.7 0 0 1 .884-.248 1.7 1.7 0 0 1 .649.137ZM4 6.549a2.553 2.553 0 0 1 2.55-2.55 2.552 2.552 0 0 1 2.549 2.55A2.551 2.551 0 0 1 6.55 9.098 2.552 2.552 0 0 1 4 6.549Zm1.1 0A1.451 1.451 0 0 0 6.549 8 1.45 1.45 0 0 0 8 6.549a1.451 1.451 0 0 0-1.449-1.45A1.451 1.451 0 0 0 5.1 6.549Z"/>
        </svg>
        @break
    @case('home')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13.5" height="13.5" viewBox="0 0 13.5 13.5" {{ $attributes->merge(['class']) }}>
            <path d="M3.267 13.2a1.936 1.936 0 0 1-1.933-1.934V7.2H.6a.6.6 0 0 1-.554-.37.6.6 0 0 1 .131-.654l6-6a.6.6 0 0 1 .849 0l6 6a.6.6 0 0 1 .13.654.6.6 0 0 1-.554.37h-.733v4.067a1.936 1.936 0 0 1-1.934 1.934Zm-.733-6.6v4.666a.734.734 0 0 0 .733.734h6.667a.734.734 0 0 0 .733-.734V6.502a.6.6 0 0 1 .336-.445h.02a.6.6 0 0 1 .127-.038L6.588 1.458 2.027 6.019a.6.6 0 0 1 .073.018h.015a.6.6 0 0 1 .4.484v.084Zm2.734 3.267a.6.6 0 0 1-.6-.6V6.6a.6.6 0 0 1 .6-.6h2.667a.6.6 0 0 1 .6.6v2.667a.6.6 0 0 1-.6.6Zm.6-1.2h1.467V7.2H5.868Z"/>
        </svg>
        @break
    @case('lt')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="8.906" height="8.993" viewBox="0 0 8.906 8.993" {{ $attributes->merge(['class']) }}>
            <path d="M7.8 8.907.41 5.07a.761.761 0 0 1 .015-1.358L7.806.078a.759.759 0 0 1 1.017.346.761.761 0 0 1-.346 1.017L2.441 4.413 8.5 7.559a.76.76 0 0 1-.7 1.348Z"/>
        </svg>
        @break
    @case('minus')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="9.5" height="1.547" viewBox="0 0 9.5 1.547" {{ $attributes->merge(['class']) }}>
            <path d="M.571 1.148a.571.571 0 0 1 0-1.142c3.621-.013 8.358 0 8.358 0a.571.571 0 0 1 0 1.142"/>
        </svg>
        @break
    @case('paper-plane')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="11" height="11" viewBox="0 0 11 11" {{ $attributes->merge(['class']) }}>
            <path d="M10.899.098a.35.35 0 0 1 .077.378L6.9 10.67a.525.525 0 0 1-.931.087L3.743 7.258l-3.5-2.226a.525.525 0 0 1 .088-.934L10.516.026a.35.35 0 0 1 .383.072ZM4.442 7.054l1.934 3.038 3.315-8.288Zm4.754-5.745L.908 4.624l3.04 1.934 5.249-5.249Z"/>
        </svg>
        @break
    @case('paper-w-check')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.557" height="13" viewBox="0 0 10.557 13" {{ $attributes->merge(['class']) }}>
            <path d="M1.875 13A1.878 1.878 0 0 1 0 11.124v-9.25A1.877 1.877 0 0 1 1.875-.001H6.5a.551.551 0 0 1 .4.167l3.295 3.294a.552.552 0 0 1 .167.382s0 .009 0 .014v7.267a1.878 1.878 0 0 1-1.875 1.876ZM1.107 1.875v9.25a.769.769 0 0 0 .768.768h6.608a.769.769 0 0 0 .768-.768V4.411H7.162a1.216 1.216 0 0 1-1.214-1.215V1.107H1.876a.77.77 0 0 0-.769.772Zm5.947 1.321a.107.107 0 0 0 .108.108h1.307L7.054 1.889Zm-2.927 7-1.321-1.32a.555.555 0 0 1 0-.783.555.555 0 0 1 .783 0l.929.93 2.251-2.252a.554.554 0 0 1 .783 0 .554.554 0 0 1 0 .782l-2.643 2.643a.554.554 0 0 1-.392.163.553.553 0 0 1-.391-.165Z"/>
        </svg>
        @break
    @case('plus')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="9.5" height="9.5" viewBox="0 0 9.5 9.5" {{ $attributes->merge(['class']) }}>
            <path d="M4.75 9.5a.572.572 0 0 1-.571-.571V5.321H.571a.571.571 0 0 1 0-1.142h3.608V.571a.571.571 0 0 1 1.142 0v3.608h3.608a.571.571 0 0 1 0 1.142H5.321v3.608a.572.572 0 0 1-.571.571"/>
        </svg>
        @break
    @case('print')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="14.5" height="14.2" viewBox="0 0 14.5 14.5" {{ $attributes->merge(['class']) }}>
            <path d="M4.934 14.202a2.048 2.048 0 0 1-2.045-2.047v-.844h-.846A2.047 2.047 0 0 1-.001 9.267v-2.89a2.047 2.047 0 0 1 2.044-2.044h.846V2.044A2.047 2.047 0 0 1 4.934 0h4.333a2.047 2.047 0 0 1 2.044 2.044v2.289h.846a2.047 2.047 0 0 1 2.045 2.044v2.89a2.047 2.047 0 0 1-2.045 2.044h-.846v.844a2.047 2.047 0 0 1-2.044 2.047Zm-.846-4.935v2.888a.845.845 0 0 0 .846.846h4.333a.847.847 0 0 0 .846-.846V9.267a.849.849 0 0 0-.846-.846H4.934a.847.847 0 0 0-.846.847Zm8.068.844A.844.844 0 0 0 13 9.267v-2.89a.844.844 0 0 0-.844-.844H2.042a.847.847 0 0 0-.846.844v2.89a.847.847 0 0 0 .846.844h.846v-.844a2.047 2.047 0 0 1 2.045-2.044h4.333a2.047 2.047 0 0 1 2.044 2.044v.844Zm-2.044-5.778V2.044a.849.849 0 0 0-.846-.846H4.933a.847.847 0 0 0-.846.846v2.289Z"/>
        </svg>
        @break
    @case('search')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13" height="13" viewBox="0 0 13 13" {{ $attributes->merge(['class']) }}>
            <path d="M12.02 12.823 8.977 9.781a5.481 5.481 0 0 1-3.47 1.234A5.513 5.513 0 0 1 0 5.508a5.47 5.47 0 0 1 1.613-3.893A5.467 5.467 0 0 1 5.507 0a5.472 5.472 0 0 1 3.894 1.613 5.472 5.472 0 0 1 1.612 3.893 5.483 5.483 0 0 1-1.233 3.47l3.043 3.043a.569.569 0 0 1 0 .8.569.569 0 0 1-.4.167.566.566 0 0 1-.403-.163ZM2.42 2.416a4.342 4.342 0 0 0-1.28 3.091 4.376 4.376 0 0 0 4.371 4.371 4.376 4.376 0 0 0 4.37-4.371 4.342 4.342 0 0 0-1.28-3.091 4.343 4.343 0 0 0-3.091-1.28 4.342 4.342 0 0 0-3.094 1.28Z"/>
        </svg>
    @break
    @case('supply')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="13" height="13" viewBox="0 0 13 13" {{ $attributes->merge(['class']) }}>
            <path d="M6.206 6.251H2.394V2.432l7.553.534L9.582 5.5a.571.571 0 0 0 .484.645.726.726 0 0 0 .082.005.571.571 0 0 0 .564-.489l.451-3.142a.57.57 0 0 0-.525-.649l-8.244-.58V.569A.57.57 0 0 0 1.824 0H.571a.569.569 0 1 0 0 1.139h.683v7.718a1.817 1.817 0 1 0 2.394 1.72 1.794 1.794 0 0 0-.136-.677h1.445a.569.569 0 1 0 0-1.139H2.394V7.39h3.812a.569.569 0 1 0 0-1.139m-3.7 4.326a.683.683 0 1 1-.682-.677.682.682 0 0 1 .683.681"/>
            <path d="m12.215 12.061-.8-.8a2.335 2.335 0 0 0 .355-1.229 2.362 2.362 0 1 0-2.361 2.362 2.335 2.335 0 0 0 1.229-.355l.8.8a.55.55 0 1 0 .777-.778m-4.067-2.027a1.262 1.262 0 1 1 1.263 1.263 1.264 1.264 0 0 1-1.263-1.263"/>
        </svg>
        @break
    @case('ticket-w-percentage')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.553" height="13" viewBox="0 0 10.553 13" {{ $attributes->merge(['class']) }}>
            <path d="m9.509 12.908-1.615-1.077-1.009 1.01a.544.544 0 0 1-.384.158.544.544 0 0 1-.383-.158l-.941-.94-.94.94a.544.544 0 0 1-.768 0l-1.009-1.01-1.615 1.077a.541.541 0 0 1-.557.027.541.541 0 0 1-.287-.479V1.866A1.868 1.868 0 0 1 1.868 0h6.619a1.869 1.869 0 0 1 1.867 1.866v10.59a.543.543 0 0 1-.287.479.543.543 0 0 1-.256.064.54.54 0 0 1-.302-.091Zm-3.948-2.159.94.94.941-.94a.543.543 0 0 1 .685-.068l1.141.761V1.866a.781.781 0 0 0-.78-.781H1.869a.782.782 0 0 0-.781.781v9.576l1.142-.761a.543.543 0 0 1 .685.068l.94.94.941-.94a.541.541 0 0 1 .383-.159.541.541 0 0 1 .381.163Zm.654-3.386a1.113 1.113 0 0 1 1.1-1.125 1.114 1.114 0 0 1 1.1 1.125 1.114 1.114 0 0 1-1.1 1.125 1.113 1.113 0 0 1-1.1-1.125Zm-3.439.881a.55.55 0 0 1 0-.779L6.8 3.441a.549.549 0 0 1 .778 0 .549.549 0 0 1 0 .778L3.554 8.244a.55.55 0 0 1-.389.161.549.549 0 0 1-.389-.161ZM2.55 3.613a1.114 1.114 0 0 1 1.1-1.125 1.114 1.114 0 0 1 1.1 1.125 1.113 1.113 0 0 1-1.1 1.125 1.114 1.114 0 0 1-1.1-1.125Z"/>
        </svg>
        @break
    @case('ticket-w-text')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.553" height="13" viewBox="0 0 10.553 13" {{ $attributes->merge(['class']) }}>
            <path d="M3.845 13a.528.528 0 0 1-.373-.154l-1.021-1.022L.82 12.912a.538.538 0 0 1-.542.026.526.526 0 0 1-.278-.466V1.854A1.857 1.857 0 0 1 1.856 0h6.638a1.856 1.856 0 0 1 1.854 1.854v10.618a.526.526 0 0 1-.278.465.536.536 0 0 1-.541-.026L7.9 11.824l-1.024 1.022a.53.53 0 0 1-.746 0l-.957-.956-.955.955a.528.528 0 0 1-.373.155m1.328-2.383a.529.529 0 0 1 .372.154l.958.956.954-.955a.529.529 0 0 1 .665-.066l1.171.781V1.854a.8.8 0 0 0-.8-.8H1.856a.8.8 0 0 0-.8.8v9.633l1.17-.781a.53.53 0 0 1 .666.066l.954.955.955-.955a.528.528 0 0 1 .373-.154m1.99-1.6H5.836a.528.528 0 1 1 0-1.055h1.328a.528.528 0 1 1 0 1.055m0-2.655H3.183a.528.528 0 1 1 0-1.056h3.981a.528.528 0 1 1 0 1.056m0-2.654H3.183a.528.528 0 1 1 0-1.056h3.981a.528.528 0 1 1 0 1.056"/>
        </svg>
        @break
    @case('trash')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="10.742" height="12.5" viewBox="0 0 10.742 12.5" {{ $attributes->merge(['class']) }}>
            <path d="M1.858 12.5a.98.98 0 0 1-.98-.979V2.835H.001V1.759h10.742v1.076h-.877v8.686a.979.979 0 0 1-.979.979Zm.1-1.077h6.826V2.834H1.958Zm4.2-1.559v-5.47h1.076v5.47Zm-2.637 0v-5.47h1.076v5.47Zm0-8.788V0h3.713v1.076Z"/>
        </svg>
        @break
    @case('truck')
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="23.13" height="17.507" viewBox="0 0 23.13 17.507" {{ $attributes->merge(['class']) }}>
            <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3">
                <path d="M6.331 14.284H4.059a2.272 2.272 0 1 0 2.272-2.272 2.272 2.272 0 0 0-2.272 2.272"/>
                <path d="M15.421 14.284a2.272 2.272 0 1 0 2.272-2.272 2.272 2.272 0 0 0-2.272 2.272"/>
                <path d="M4.059 14.284H1.786V9.74M.65.65h12.5v13.634m-4.545 0h6.817m4.545 0h2.272V7.467H13.15m0-5.681h5.681l3.409 5.681"/>
                <path d="M1.786 5.195h4.545"/>
            </g>
        </svg>
        @break
    @case('wrench')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="12" height="12" viewBox="0 0 12 12" {{ $attributes->merge(['class']) }}>
            <path d="M9.868 11.648a1.767 1.767 0 0 1-1.258-.521L5.395 7.912a4.027 4.027 0 0 1-4.216-.939 4.032 4.032 0 0 1-.786-4.582.55.55 0 0 1 .884-.155l1.867 1.869h.96v-.96L2.235 1.278a.55.55 0 0 1 .152-.885 4.025 4.025 0 0 1 4.582.786 4.034 4.034 0 0 1 .939 4.216l3.216 3.216a1.779 1.779 0 0 1-1.258 3.037ZM5.523 6.712a.55.55 0 0 1 .389.161l3.476 3.476a.679.679 0 0 0 .96-.96L6.872 5.913a.55.55 0 0 1-.107-.626 2.928 2.928 0 0 0-3.112-4.151l1.39 1.39a.55.55 0 0 1 .161.389v1.74a.55.55 0 0 1-.55.55H2.916a.55.55 0 0 1-.389-.161l-1.392-1.39a2.926 2.926 0 0 0 2.888 3.4 2.9 2.9 0 0 0 1.26-.286.549.549 0 0 1 .24-.056Z"/>
        </svg>
        @break
    @case('x-mark')
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="7.52" height="7.52" viewBox="0 0 7.52 7.52" {{ $attributes->merge(['class']) }}>
            <path d="M6.324 7.315 3.759 4.75 1.194 7.315A.692.692 0 0 1 .7 7.52a.692.692 0 0 1-.5-.205.7.7 0 0 1 0-.989L2.764 3.76.2 1.195a.7.7 0 0 1 0-.991.7.7 0 0 1 .989 0L3.754 2.77 6.319.204a.7.7 0 0 1 .991 0 .7.7 0 0 1 0 .991L4.745 3.76 7.31 6.326a.7.7 0 0 1 0 .989.7.7 0 0 1-.5.205.7.7 0 0 1-.486-.205Z"/>
        </svg>
    @break
@endswitch
