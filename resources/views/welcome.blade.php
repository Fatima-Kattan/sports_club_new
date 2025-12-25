<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
        <title>Fitness Club</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-centcer  min-h-screen flex-col">
        <header class="header-container">
    @if (Route::has('login'))
        <nav class="navbar">
            <div class="main_logo"> 
                <svg fill="#05C1F7" height="64px" width="64px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-78.44 -78.44 483.73 483.73" xml:space="preserve" stroke="#05C1F7" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M264.693,326.845h-38.079c-4.418,0-8-3.582-8-8v-30.464H108.231v30.464c0,4.418-3.582,8-8,8H62.152c-4.418,0-8-3.582-8-8 v-6.939H24.074c-4.418,0-8-3.582-8-8V224.03c0-4.418,3.582-8,8-8h30.077v-6.938c0-4.418,3.582-8,8-8h38.079c4.418,0,8,3.582,8,8 v30.464h110.384v-30.464c0-4.418,3.582-8,8-8h38.079c4.418,0,8,3.582,8,8v6.938h30.077c4.418,0,8,3.582,8,8v79.875 c0,4.418-3.582,8-8,8h-30.077v6.939C272.693,323.263,269.112,326.845,264.693,326.845z M234.615,310.845h22.079v-93.753h-22.079 V310.845z M70.152,310.845h22.079v-93.753H70.152V310.845z M272.693,295.905h22.077V232.03h-22.077V295.905z M32.074,295.905h22.077 V232.03H32.074V295.905z M108.231,272.381h110.384v-16.825H108.231V272.381z M145.443,223.376c-1.331,0-2.68-0.332-3.922-1.032 c-3.849-2.17-5.209-7.05-3.04-10.898c14.273-25.312,33.543-46.712,56.214-63.181c-9.894-13.703-21.197-26.173-33.681-37.227 c-31.019,33.403-73.355,55.896-120.395,61.599c1.042,4.209,2.303,8.368,3.784,12.468c1.501,4.155-0.65,8.741-4.806,10.242 c-4.158,1.502-8.741-0.651-10.242-4.807c-5.571-15.424-8.396-31.599-8.396-48.077C20.959,63.908,84.868,0,163.423,0 c78.554,0,142.462,63.908,142.462,142.463c0,14.179-2.104,28.201-6.255,41.68c-1.301,4.223-5.78,6.589-10,5.291 c-4.223-1.3-6.591-5.777-5.291-10c3.68-11.951,5.546-24.39,5.546-36.971c0-4.869-0.276-9.673-0.814-14.4 c-25.871,2.997-50.403,11.521-72.172,24.662c4.713,7.504,9.017,15.253,12.873,23.202c1.928,3.975,0.269,8.761-3.706,10.689 c-3.975,1.925-8.762,0.269-10.689-3.707c-3.573-7.366-7.501-14.486-11.761-21.341c-20.629,15.091-38.175,34.642-51.196,57.736 C150.948,221.911,148.236,223.376,145.443,223.376z M66.601,61.193c-18.492,21.994-29.642,50.354-29.642,81.27 c0,4.834,0.274,9.639,0.819,14.399c43.257-5.019,82.233-25.484,110.873-56.012C124.555,82.391,96.76,68.814,66.601,61.193z M171.329,98.998c13.625,12.048,25.936,25.664,36.611,40.442c23.598-14.378,50.218-23.758,78.307-27.155 c-9.987-40.635-39.667-73.615-78.299-88.194C201.125,51.937,188.433,77.333,171.329,98.998z M79.321,48.096 c28.682,8.458,55.914,22.357,79.681,40.709c15.771-20.065,27.435-43.606,33.62-69.402C183.248,17.179,173.468,16,163.423,16 C131.162,16,101.686,28.14,79.321,48.096z"></path> </g></svg>
                <h1>Fitness</h1>
            </div>
            
            <div class="nav_list">
                <ul>
                    <li><a href="#home">home</a></li>
                    <li><a href="#sports">sports</a></li>
                    <li><a href="#coach">coachs</a></li>
                    <li><a href="#footer">contact</a></li>
                    <li><a href="#about">about</a></li>
                    <div class="search-icon" id="searchIcon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15.5 14H14.71L14.43 13.73C15.41 12.59 16 11.11 16 9.5C16 5.91 13.09 3 9.5 3C5.91 3 3 5.91 3 9.5C3 13.09 5.91 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="currentColor"/>
                        </svg>
                    </div>
                </ul>
            </div>

            <!-- User Profile Dropdown -->
    <div class="user-profile-container">
    @auth
        <div class="user-dropdown">
            <button class="user-dropdown-btn" id="userDropdownBtn">
                
                <div class="user-avatar">
        @php
        function getNavbarImage($userImage) {
            if (!$userImage) {
                return asset('images/users/user.jpg');
            }
            
            if (str_starts_with($userImage, 'images/users/')) {
                return asset($userImage);
            }
            
            return asset('images/users/' . $userImage);
        }
        @endphp
    
        <img src="{{ getNavbarImage(auth()->user()->image) }}" 
        alt="{{ auth()->user()->full_name }}"
        onerror="this.onerror=null; this.src='{{ asset('images/users/user.jpg') }}';">
                </div>
                <span class="user-name">{{ auth()->user()->full_name }}</span>
                <svg class="dropdown-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
                            
                <div class="dropdown-menu" id="dropdownMenu">
                    <div class="dropdown-header" onclick="window.location.href='{{ route('profile.edit') }}'">
                    <div class="header-avatar">
                        @php
                    $userImage = auth()->user()->image ?: 'images/users/user.jpg';
                        @endphp 

            <img src="{{ asset($userImage) }}" 
                alt="{{ auth()->user()->full_name }}"
                onerror="this.src='{{ asset('images/users/user.jpg') }}'">
            </div>
    <div class="header-info">
        <h4>{{ auth()->user()->full_name }}</h4>
        <p>{{ auth()->user()->email }}</p>
    </div>
</div>
                    
                        <a href="{{ url('/profile') }}" class="dropdown-item">
                        <i class="fas fa-user-alt"></i>
                        <span>Profile</span>
                        </a>
                            <div class="dropdown-divider"></div>
                                
                            @if(auth()->user()->is_admin)
                        <a href="{{ url('/dashboard') }}" class="dropdown-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        <span>Dashboard</span>
                        </a>
    
                        <div class="dropdown-divider"></div>
                        @endif
                                
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item logout-form">
                                @csrf
                                <button type="submit" class="logout-btn">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 17L21 12L16 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 12H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Log out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="auth-btn login-btn">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-btn">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        </nav>
    @endif
</header>

        <div class="search-overlay" id="searchOverlay">
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Enter what you want to search for.." class="search-input">
                <button class="search-close" id="searchClose">✕</button>
            </div>
        </div>
        <section id="home">
            <div class="shadow-effects">
                <div class="shadow-1"></div>
                <div class="shadow-2"></div>
            </div>
            <div class="overlay">
                <div class="home-text">
                    <h1>Welcome to Power & <br> Fitness Club</h1>
                    <p>Achieve your best self in a professional environment designed for strength, endurance, and transformation. Join us and take your fitness journey to the next level.</p>
                    <a href="#services" class="btn">Discover More</a>
                </div>
            </div>
        </section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="about-container">
        <!-- Header -->
        <div class="about-header">
            <h2 class="about-title">ABOUT OUR CLUB</h2>
            <div class="title-underline"></div>
            <p class="about-subtitle">Where Champions Are Made</p>
        </div>

        <!-- Content Grid -->
        <div class="about-content">
            <!-- Text Content -->
            <div class="about-text">
                <h3>Your Ultimate Sports Destination</h3>
                <p>
                    Welcome to <strong>Fitness Club</strong>, the premier multi-sport facility 
                    where passion meets performance. With over 10,000 sq ft of state-of-the-art 
                    training spaces, we offer everything from strength training to aquatic sports.
                </p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <span class="feature-icon">🏋️‍♂️</span>
                        <div class="feature-text">
                            <h4>Strength & Conditioning</h4>
                            <p>World-class equipment for power training</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <span class="feature-icon">🏊‍♂️</span>
                        <div class="feature-text">
                            <h4>Aquatic Center</h4>
                            <p>Olympic-sized pool with professional coaching</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <span class="feature-icon">🥊</span>
                        <div class="feature-text">
                            <h4>Combat Sports</h4>
                            <p>Boxing, MMA, and martial arts disciplines</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <span class="feature-icon">👥</span>
                        <div class="feature-text">
                            <h4>Team Sports</h4>
                            <p>Basketball, volleyball, and soccer facilities</p>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="about-image">
                <div class="main-image">
                    <img 
                    src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" 
                    alt="Modern Gym Facility with State-of-the-Art Equipment"
                    loading="lazy"
                    >
                </div>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-item">
                <span class="stat-number">15+</span>
                <span class="stat-label">Sports</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">25+</span>
                <span class="stat-label">Coaches</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">2000+</span>
                <span class="stat-label">Members</span>
            </div>
        </div>
        <!-- CTA Button -->
        <div class="about-cta">
            <a href="#contact" class="cta-button">Join Our Champions</a>
        </div>
    </div>
</section>

            <!-- Sports Section -->
<section class="sports-section" id="sports">
    <div class="sports-container">
        <!-- Header -->
        <div class="sports-header">
            <h2 class="sports-title">OUR SPORTS</h2>
            <div class="title-underline"></div>
            <p class="sports-subtitle">Discover Your Passion</p>
        </div>

        <!-- Sports Categories Navigation -->
        <div class="sports-categories">
            <button class="category-btn active" data-category="all">All Sports</button>
            <button class="category-btn" data-category="strength">Strength</button>
            <button class="category-btn" data-category="aquatic">Aquatic</button>
            <button class="category-btn" data-category="combat">Combat</button>
            <button class="category-btn" data-category="team">Team Sports</button>
            <button class="category-btn" data-category="cardio">Cardio</button>
        </div>

        <!-- Sports Grid -->
        <div class="sports-grid">
            <!-- Strength Training -->
            <div class="sport-card" data-category="strength">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1534367507877-0edd93bd013b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Strength Training" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🏋️‍♂️</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Strength Training</h3>
                    <p class="sport-description">
                        Build power and muscle with our world-class equipment and expert coaching
                    </p>
                    <div class="sport-features">
                        <span class="feature">Free Weights</span>
                        <span class="feature">Machines</span>
                        <span class="feature">Personal Training</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">60-90 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>

            <!-- Swimming -->
            <div class="sport-card" data-category="aquatic">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Swimming" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🏊‍♂️</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Swimming</h3>
                    <p class="sport-description">
                        Olympic-sized pool with professional coaching for all skill levels
                    </p>
                    <div class="sport-features">
                        <span class="feature">Olympic Pool</span>
                        <span class="feature">Lap Swimming</span>
                        <span class="feature">Swim Lessons</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">45-120 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>

            <!-- Boxing -->
            <div class="sport-card" data-category="combat">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1549719386-74dfcbf7dbed?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Boxing" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🥊</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Boxing</h3>
                    <p class="sport-description">
                        Learn technique, build endurance, and improve your fitness with boxing
                    </p>
                    <div class="sport-features">
                        <span class="feature">Heavy Bags</span>
                        <span class="feature">Sparring</span>
                        <span class="feature">Cardio Boxing</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">60 min</span>
                        <span class="level">Intermediate</span>
                    </div>
                </div>
            </div>

            <!-- Basketball -->
            <div class="sport-card" data-category="team">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Basketball" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🏀</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Basketball</h3>
                    <p class="sport-description">
                        Full-size courts for pickup games, leagues, and skill development
                    </p>
                    <div class="sport-features">
                        <span class="feature">Full Courts</span>
                        <span class="feature">Leagues</span>
                        <span class="feature">Skill Clinics</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">90-120 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>

            <!-- MMA -->
            <div class="sport-card" data-category="combat">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1599058917765-2adc5b8b0f43?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="MMA" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🥋</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Mixed Martial Arts</h3>
                    <p class="sport-description">
                        Comprehensive MMA training combining striking and grappling techniques
                    </p>
                    <div class="sport-features">
                        <span class="feature">Striking</span>
                        <span class="feature">Grappling</span>
                        <span class="feature">Self Defense</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">75 min</span>
                        <span class="level">Advanced</span>
                    </div>
                </div>
            </div>

            <!-- Soccer -->
            <div class="sport-card" data-category="team">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Soccer" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">⚽</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Soccer</h3>
                    <p class="sport-description">
                        Indoor and outdoor facilities for training, matches, and tournaments
                    </p>
                    <div class="sport-features">
                        <span class="feature">Indoor Field</span>
                        <span class="feature">Youth Programs</span>
                        <span class="feature">Adult Leagues</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">90 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>

            <!-- Cycling -->
            <div class="sport-card" data-category="cardio">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Cycling" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🚴‍♂️</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Indoor Cycling</h3>
                    <p class="sport-description">
                        High-energy cycling classes with motivating instructors and great music
                    </p>
                    <div class="sport-features">
                        <span class="feature">Studio Cycling</span>
                        <span class="feature">HIIT Classes</span>
                        <span class="feature">Heart Rate Training</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">45-60 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>

            <!-- Yoga -->
            <div class="sport-card" data-category="cardio">
                <div class="sport-image">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Yoga" loading="lazy">
                    <div class="sport-overlay">
                        <span class="sport-icon">🧘‍♀️</span>
                    </div>
                </div>
                <div class="sport-content">
                    <h3 class="sport-name">Yoga & Pilates</h3>
                    <p class="sport-description">
                        Improve flexibility, strength, and mental focus with our yoga classes
                    </p>
                    <div class="sport-features">
                        <span class="feature">Hot Yoga</span>
                        <span class="feature">Pilates</span>
                        <span class="feature">Meditation</span>
                    </div>
                    <div class="sport-meta">
                        <span class="duration">60-75 min</span>
                        <span class="level">All Levels</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="sports-cta">
            <h3>Ready to Start Your Sports Journey?</h3>
            <p>Join today and get access to all our sports facilities and classes</p>
            <a href="#membership" class="cta-button">View Membership Plans</a>
        </div>
    </div>
</section>



{{-- ================================= --}}
<section class=" coach-div" id="coach">

    <div class="coach-section">
        <h2 class="coach-title">OUR COACHS </h2>
        <div class="title-underline"></div>
        <p class="coach-subtitle"> Our featured coaches possess 3+ years of professional experience</p>
    </div>
    
    <div class="carousel-container">
        <button class="nav-btn prev">&#10094;</button>
        <div class="carousel-track">
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,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" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,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" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,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" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,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" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,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" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
        <div class="coach-card">
            <div class="avatar">
            <img  src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PDQ0PDw0NDQ0PDw8PDg8NDQ8NDw8NFREWFhURFhYYHSggGBolGxUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OFxAPFy0fGSUtLSsrLS8tKy0tKy0tKy0tKysrLSsrKy0tLS0tKy0rLS0rLS0tNS0tLSstLS0tKy0rLf/AABEIAKgBLAMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAAAQIDBAUGBwj/xAA6EAACAQMCAwYEBAQFBQAAAAAAAQIDBBESIQUxQQYiUWFxgRMykaEHscHwFCNS0TNygqLxJUJio+H/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIEAwX/xAAiEQEAAgIBAwUBAAAAAAAAAAAAAQIDESESMUEEEyJRcWH/2gAMAwEAAhEDEQA/APYxoANBgAwAAAgBggAAAAAABgIAABBk1naS9lQtKk4SUJt06cZvlB1KkYa/bVn2PL+0nbX4KdKwbjLU1UuJJTqSw8ZTl1fPL33MzbTVazL1m/4jQt4a69anRi3hOpJRy/BeJh1+0dnCnGpK5paJLMcS1OS8kt2eDX/GriuoVLitUqzccRcpOWI7/wDPua+rxCdZtOpJrk2222vNvoZ65b9uPL6I4T2ks7uTjb3EKk1nubxlhc8J8y6543aU6nwql1b06u3cnVhGWXy2bPnKjxJ2ul0ZtVIz1xcY4kp7L5ueDY3Paepc0I06lGCkt5TimpVZdZPzHXOj2433fRMJppNPKe6a3GeL9gu2n8E6lCvOpUt1vTjhScHnfDb5eR6zwji9C7p/EoVFUjya3Uovwae6NxaJYtWYZwCA0yYgEAxZAQDEAgAAEAMQxBCEMQAIACMwYhoNAYAADACIAAAAAAAEMQUCAw+M3v8AD2txXxqdKlOajy1SS2XuwOe7b8Yt5WV9QVSM6sNFOcUm9M5PMVnx7rPCeLVMSS83q88pbfX8zOvb3FxOo6mudaTqVXvHE3nKfo8/Y1tWSqtvP/J4zO5294jUaK6uc0vPQo+m2/78zGo19EUopanhZ8zZ2vDKtd6adNzltnC29zbR7BXc1lxhH/WSb1ju1GO09ocw7iMW9lNrm87Z9QoV5Sy1FxXR/wBsnRP8O7lZ3guu76+RrL7gV3aSTqYnSb3fPH9iddZ42vt3jnTFjHLTzpx45/Q7Dsn2olZPEMPW1rlKOzS6dOuN+nmcZUuVB4Sw/ASuW5Y6f05+7Lyzw+o6FzCai4yT1RUkk0+7tv8ActyeM/hjfXE7+jT1udPRJz1NvTTjBqEV5Jvly3Z7Jk9qzt42jUnkCOQyaZSEIMgMBCyAwEAAIBMIBAAAAgCM0YDDQAAAYABAAABAAAACGIKRj31JTo1YSjrjKEk4f1LD7vuZAmB8s9pbapSuatKUHCcZuMlza57Z679TYdkuAyuJ6ptqkvrLyOs/GKjCPEYNRWZ28JS8c6pLP2Rf2KotUIyaxnkjmyzNa8OvDEWtuXQcJ4dCnFRhFRX3NxCgY9um+RlxU10ycsQ7plRdUDRcVtoyg4tJ5ydLUi5Lkae+tnv0Jav0tJ+3kXaLg9SjNyhDVDphZ0mkoyS57y985PU+Jw2aa5fkee8bpKnXlhJNpten7ydOHJNuJcnqMcV+UPRfwUt5Opd1tMtKhCmpvZa85cV7Y/bPV8nnn4LU2uH3EnylctL2pQz92eg5OqvZw27pZDJHIZKieRCyLIEgI5DJRICOQCGIBAMQCyAwFkMlRnjEhojQGIYAAARAAAFAAACAGIITFkbIsqvJvxsoQ+LaVl/ifDqU5rfaPOD+rkWW1SVK1oKnT+JNwhpitl8q3fkb38S+FKtScsZl8CeP88HqX5te5r+Epu3oYai/hx3azjZHJmnnl3YI1Ea8sCa4s4ZhUtrdeMn3l9U0jO7P8RvVLTc1qVZN4UoaeflhIxbrs5RqPVWqXFaecpznFpbNYiuSW/JGTZ8Lp0I9yGO7GMVtslyfLmec2jXD3ik75bjjfEJUaTaajJ/K2eeXca1acp1uLSoR3emLnLCz5NLwOm7R1NVOlnfDWz5Mjb2lKpT/AMGEot6tMlJpS2WfsjNb88rbHOuHLSsJuOu34h/FZ56sNNehpu1Vs/hUptYnGWmXvzX2O8ueE0YfzVSjCWMdzu7efic1xi1daCgucqqznw3b/I1W3yYyU+OnV/g5cTVtXt5ReFJVoy/zJRcf9qfueiZOV7BUIxo1pJLLlGO3hGOcfc6fJ10ndduHNWK3mITyPJWmNM28k8hkjkAJZAjkeSiQZIjyEMQCAAEIoeRkcjCNiNCGiKBiGFAABEAAAAAAFJiYxBEWRZJkWUaXtPbudKDTxiTWem6ys+8Uc7QpqOI7JR225Yzn9Tt6tOMk4ySlF801k5DjlJUa7jBYTgpRWW/z80cueuvk7PTZN6oyZzpxWW15tmJczzso9MvPPBo7riWmtGLTlphGcVyjrkvmb5bIrr3EriLzXtXh7R1xnj1ayc8Rt3fjYccsn/D69Ue7h4yuRhcD4gotxa1JJPMefoYN9b1J0nGde2jHZKKrSccemM+xopVlbLa5pLyjCenPlhF6fpdz5h3XE7qEqeVjDOXi06iXTLz5bNZ+5C2r16lCrVmk6Tg5QnHKUpqSSxnyf2Oh7D04/wAbXi1GWijzaTxLXFZX3FKzNtPPLfprt03Ze3+HarZx1zlNJrDUXhL7JG2yJsWTuiNRp8u1uq0ylkkmVokmVlPICAolkCIyiQCAIYCAAAQFAMQBGzGhDRFMBDAAACKAAAgAAAQhiKqLIskyLCIM5XtzScadO4XKm9E8dIy5P67e6OqZr+O01OzuYtZTozyn6GLxE1mJbxzMWiYcVwyNG7pzhUjCeyyml8ucxa9Hn6onwulLh0JU6dpSuKWcxk5fDklq1aZbNPHjtyOfpXErKpGW7injL/76bW69V+h21vcRqQU4yWJLOeaycdZ6X0+rfEqp8azTf/ToRl8PR3qia+unl7nM8TuKt9NRqUKNKim9WiLblmbljL/TwNrfOrGSX8mSb8N0ilzSTlKS7qb22SfgW9+Gq1rHMQ1fay/jSp0KEMLlUkummPyr67+xvfw34fOFtUuqialctOnnn8GOcS925P0SPOeI3P8AFV5y5rOM9FFbJHs/A4abK0j4W9Ff+tHphrEfrj9RaZj+MwQMidDkTRJFaZNMCYCGUMZEaKhjEhgAhiABABQDIjCNoMQ0RQMQwAAAAAAABAAAJgJhSZBkmRYRFmDxipGNtW1SUdVOcY5aWZOLwl4s2Hw+R53xhzndVJzbbVScIJt4hCMmkkunLfzPHNk6I/XvgxddvxjXVlGtRlCSymvo/E0Nne17LNOpqnST7slvt4PwOupR2KZW8XJ5WTjrPh9G9fMd2ir9oKUkmpLlvukc/wAV4vKs3TpN4ls5dEvHzOwu+AW8k5OnHx+VHOqxgqqUVtk1uGNWlh0rNU6WEunu2ewcNqRlb0HGSklSprKed1FLB5nfU8bF3Brq4orXQqNLPepy71OeOjX6rcuPL0zuWc2HriIr4emNiyZEbfVHKeH4PkY1WDi9/qt0dr5ySZNMoTJxkEXpjK0ySZRMZBMkmVEgEADEAgABAUMBDCNqMQyKBiGFAAAAIBBAGRNkZSwBJshKSISm/QjgKk5BFCRJAXLkjgu0tB07+UWu7VXxoPo+k17S3/1I7ym+hgcb4XG5ppbRqwblSm+kuqf/AIvr7PojyzU66vbBk6Lc9nHw2FN75J16UoScJxcJx+aL5+vmvMx6ksI4O0vpd4VX9WWiUVyfM0trT/mN9EjPubjojHcNNNt82JldMK93yZ3Zeg51IU8ZTnmXlTW8vtt7orp2U6iUYQc5y5RS3Z2/Zvgatod7DqzS1tbqK/oX9+p6Y8c3n+PHNkikT9t5Rj3PUpi3qn1Txs91yMp8sdEY8Flv1O98xXVoxabxpx1jy+hjzpuO/Nf1Ldf/AA2NSOzXiY8otbr/AJCsaMiSZJwT5d1/7X/Yq5bPZhFqZJMpUiaZRamMrTJZCJCyLIZAAEIqJDI5GBtwEMimAAAAAgBibBkWwCTK9Iqj6FkOQVAMDqISAaGERsARbF59SoQFd/YUq6SqwUsfLJZjKPo1ujR3fZbK/l12vKrDV7Zjj8jolU8dw1x80edsdbd4elMt6dpcZDsdW1ZlVoY8nN/bBnLspTelVKspY6U4qC+rydI3Hxf0E5xXJN/YxGCkeG59TknywrTh1OlHTTgo+L5yfq3uy54Wy5hUqv09BQie0Rp4zMzzIqPCfoRt49SNd9C+msIqIvd4FKIUt235ljQViTplFdYjy6/Qz9OTGvo/OvCnJ+/7REYSZNMx6ctixMC9MkmVRZNMonkMkchkIYCAqJDyRADdAAEUAAAAmDE2AmyLYNlc5bMBLdv1LaXIqpcvRplkXu/3++oVKa2IxWxNvkRSAaAAAQhiAQgYmAERim8ICqW7LorYqity6XIDHSzIvk8RK6aHXfdYBQWyLpFdFbIdzLEfN7AOissw7+eI1JeLwvSPP8vuZsHpg35beprLzdxgum3vzf3x9GBhaNKj5rP3aJRZLiDxUUf6acfrllUWBfFliZRFliYFmQI5DIRPIEcjKiQCGBuwEBGjEAADIsACIMrmsp+mQAAo+HisEpePs/7iAKkpZa/eGWYAABoTAAExCAKTIjABpFcwABxiSmgAIikQr8gACykV3j+VeYABK4qYUfJZf6Z/P2MS0p5k5vkt9/Dz/MAA01WvrrVJeO69On2wWRYABbFliYABLIABYQxgARJDAAP/2Q==" alt="Ahmad">
            </div>
            <div class="coach-details">
                <h3 class="coach-name">Ahmad Ali</h3>
                <p  class="coach-specialty">Back-End Developer</p>
            </div>
        </div>
    
    
        
        </div>
        <button class="nav-btn next">&#10095;</button>
    
        <div class="coach-cta">
            <a href="#contact" class="cta-button">Show all Coaches</a>
        </div>
    </div>
</section>

{{-- ================================= --}}


        <footer class="footer" id="footer">
            <div class="footer-container">
                <div class="footer-section">
                    <h3 class="after_line">About Us</h3>
                    <p>
                        Power & Fitness Club is your ultimate destination to achieve your fitness goals. We offer state-of-the-art equipment and specialized training programs led by professional trainers.
                    </p>
                    <div class="social-links">
                        <a href="#"><svg viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path stroke="#05C1F7" stroke-linecap="round" stroke-width="12" d="M96 170c40.869 0 74-33.131 74-74 0-40.87-33.131-74-74-74-40.87 0-74 33.13-74 74 0 40.869 33.13 74 74 74Zm0 0v-62m30-48h-10c-11.046 0-20 8.954-20 20v28m0 0H74m22 0h22"></path></g></svg><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><svg viewBox="-2.4 -2.4 52.80 52.80" id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" fill="#05C1F7" stroke="#05C1F7" stroke-width="0.00048000000000000007"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="2.496"><defs><style>.cls-1{fill:none;stroke:#05C1F7;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="cls-1" d="M38.74,16.55v1c0,10.07-7.64,21.61-21.62,21.61A21.14,21.14,0,0,1,5.5,35.71a12.22,12.22,0,0,0,1.81.11,15.25,15.25,0,0,0,9.44-3.24,7.56,7.56,0,0,1-7.1-5.29,6.9,6.9,0,0,0,1.44.15,7.53,7.53,0,0,0,2-.27A7.57,7.57,0,0,1,7,19.72v-.1a7.42,7.42,0,0,0,3.44.94A7.54,7.54,0,0,1,8.05,10.5a21.58,21.58,0,0,0,15.68,7.94,6.38,6.38,0,0,1-.21-1.74,7.55,7.55,0,0,1,13.17-5.31,15.59,15.59,0,0,0,4.83-1.85,7.65,7.65,0,0,1-3.39,4.27,15.87,15.87,0,0,0,4.37-1.26,15.56,15.56,0,0,1-3.76,4Z"></path></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:#05C1F7;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="cls-1" d="M38.74,16.55v1c0,10.07-7.64,21.61-21.62,21.61A21.14,21.14,0,0,1,5.5,35.71a12.22,12.22,0,0,0,1.81.11,15.25,15.25,0,0,0,9.44-3.24,7.56,7.56,0,0,1-7.1-5.29,6.9,6.9,0,0,0,1.44.15,7.53,7.53,0,0,0,2-.27A7.57,7.57,0,0,1,7,19.72v-.1a7.42,7.42,0,0,0,3.44.94A7.54,7.54,0,0,1,8.05,10.5a21.58,21.58,0,0,0,15.68,7.94,6.38,6.38,0,0,1-.21-1.74,7.55,7.55,0,0,1,13.17-5.31,15.59,15.59,0,0,0,4.83-1.85,7.65,7.65,0,0,1-3.39,4.27,15.87,15.87,0,0,0,4.37-1.26,15.56,15.56,0,0,1-3.76,4Z"></path></g></svg><i class="fab fa-twitter"></i></a>
                        <a href="#"><svg width="226px" height="226px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 5H9.5C7.29086 5 5.5 6.79086 5.5 9V15C5.5 17.2091 7.29086 19 9.5 19H15.5C17.7091 19 19.5 17.2091 19.5 15V9C19.5 6.79086 17.7091 5 15.5 5Z" stroke="#05C1F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 15C10.8431 15 9.5 13.6569 9.5 12C9.5 10.3431 10.8431 9 12.5 9C14.1569 9 15.5 10.3431 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15Z" stroke="#05C1F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <rect x="15.5" y="9" width="2" height="2" rx="1" transform="rotate(-90 15.5 9)" fill="#05C1F7"></rect> <rect x="16" y="8.5" width="1" height="1" rx="0.5" transform="rotate(-90 16 8.5)" stroke="#05C1F7" stroke-linecap="round"></rect> </g></svg><i class="fab fa-instagram"></i></a>
                        <a href="#"><svg viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.168 19.0028C20.4724 19.0867 22.41 17.29 22.5 14.9858V9.01982C22.41 6.71569 20.4724 4.91893 18.168 5.00282H6.832C4.52763 4.91893 2.58998 6.71569 2.5 9.01982V14.9858C2.58998 17.29 4.52763 19.0867 6.832 19.0028H18.168Z" stroke="#05C1F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.008 9.17784L15.169 11.3258C15.3738 11.4454 15.4997 11.6647 15.4997 11.9018C15.4997 12.139 15.3738 12.3583 15.169 12.4778L12.008 14.8278C11.408 15.2348 10.5 14.8878 10.5 14.2518V9.75184C10.5 9.11884 11.409 8.77084 12.008 9.17784Z" stroke="#05C1F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3 class="after_line">Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#sports">Sports</a></li>
                        <li><a href="#coach">Coachs</a></li>
                        <li><a href="#footer">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3 class="after_line">Our Services</h3>
                    <ul>
                        <li><a href="#">Strength Training</a></li>
                        <li><a href="#">Cardio Exercises</a></li>
                        <li><a href="#">Yoga & Pilates</a></li>
                        <li><a href="#">Nutrition & Diet</a></li>
                        <li><a href="#">Personal Training</a></li>
                        <li><a href="#">Group Programs</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <div class="contact-info margin_contact">
                        <p>Aleppo, Al-Zahraa Association.</p>
                    </div>
                    <div class="contact-info margin_contact">
                        <p>+963 345 543 34</p>
                    </div>
                    <div class="contact-info margin_contact">
                        <p>fitness_club@gmail.com</p>
                    </div>
                    <div class="contact-info margin_contact">
                        <p>Monday - Friday : <br> 10:00 AM - 10:00 PM<br>The rest of the week : <br> 11:00 AM - 11:00 PM</p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>All Rights Reserved &copy; 2025 Fitness Club</p>
            </div>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
        

        <script src="{{ asset('js/index.js') }}"></script>
    </body>
    </html>
