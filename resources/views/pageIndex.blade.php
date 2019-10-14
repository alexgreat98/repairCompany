@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('banner')
    <div class="index__page-banner-parallax">
        <div class="index__page-banner-center">
            <div class="index__page-banner-title">Ремонт оффисов под ключ</div>
            <div class="index__page-banner-form">

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="index__page-wrap">
        <div class="index__page-advantages">
            <div class="sec-title centered">
                <h2 class="title">Почему именно мы</h2>
            </div>
            <div class="index__page-advantages-list">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 index__page-advantages-item">
                        <div class="index__page-advantages-icon">
                            <span>
                                <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTQxLjUsMmgtNlYxYzAtMC41NTMtMC40NDctMS0xLTFoLTljLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2MWgtNmgtMTN2NThoNDlWMkg0MS41eiBNNTIuNSwzOC41ODZsLTEsMVY1aC05VjRoMTBWMzguNTg2eiAgICBNMzYuMDg2LDU1SDEwLjVWN2g3djJ2MWgxaDIzaDFWOVY3aDd2MzQuNTg2TDM2LjA4Niw1NXogTTQ5LjUsNDQuNDE0VjU1SDM4LjkxNEw0OS41LDQ0LjQxNHogTTMzLjUsMnYxdjJoLTdWM1YySDMzLjV6IE0yNC41LDR2MiAgIHYxaDFoOWgxVjZWNGg1djF2M2gtMjFWNVY0SDI0LjV6IE03LjUsNGgxMHYxaC05djUyaDI1LjU4NmwtMSwxSDcuNVY0eiBNMzUuOTE0LDU4bDEtMUg1MS41VjQyLjQxNGwxLTFWNThIMzUuOTE0eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMThoOWMwLjU1MywwLDEtMC40NDcsMS0xcy0wLjQ0Ny0xLTEtMWgtOWMtMC41NTMsMC0xLDAuNDQ3LTEsMVMxNS45NDcsMTgsMTYuNSwxOHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD4KCTxwYXRoIGQ9Ik0xNi41LDI2aDVjMC41NTMsMCwxLTAuNDQ3LDEtMXMtMC40NDctMS0xLTFoLTVjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFTMTUuOTQ3LDI2LDE2LjUsMjZ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguNSwyNGgtN2MtMC41NTMsMC0xLDAuNDQ3LTEsMXMwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFTMzkuMDUzLDI0LDM4LjUsMjR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjUuNzksMjQuMjlDMjUuNiwyNC40NzksMjUuNSwyNC43MjksMjUuNSwyNWMwLDAuMjcsMC4xMDksMC41MiwwLjI5LDAuNzFDMjUuOTc5LDI1Ljg5LDI2LjIyOSwyNiwyNi41LDI2ICAgYzAuMjcsMCwwLjUyLTAuMTAxLDAuNzEtMC4yOWMwLjE4LTAuMTksMC4yOS0wLjQ1LDAuMjktMC43MWMwLTAuMjYxLTAuMTEtMC41MjEtMC4yOS0wLjcxQzI2LjgzLDIzLjkyLDI2LjE3LDIzLjkyLDI1Ljc5LDI0LjI5eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTQ0LjIxLDI0LjI5Yy0wLjM3LTAuMzctMS4wNC0wLjM3LTEuNDIsMEM0Mi42LDI0LjQ3OSw0Mi41LDI0LjcyOSw0Mi41LDI1YzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MSAgIEM0Mi45NzksMjUuODksNDMuMjI5LDI2LDQzLjUsMjZjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFDNDQuNSwyNC43MzksNDQuMzksMjQuNDc5LDQ0LjIxLDI0LjI5eiAgICIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI4LjUsMzJoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDFzMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xUzI5LjA1MywzMiwyOC41LDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTE2LjUsMzRjMC4yNywwLDAuNTItMC4xMSwwLjcxLTAuMjljMC4xOC0wLjE5LDAuMjktMC40NSwwLjI5LTAuNzFjMC0wLjI2MS0wLjExLTAuNTIxLTAuMjktMC43MSAgIGMtMC4zNy0wLjM3LTEuMDUtMC4zNy0xLjQyLDBjLTAuMTgxLDAuMTg5LTAuMjksMC40MzktMC4yOSwwLjcxYzAsMC4yNywwLjEwOSwwLjUyLDAuMjksMC43MUMxNS45NzksMzMuODksMTYuMjI5LDM0LDE2LjUsMzR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMTkuNjQ1LDQxLjE2NmMtMi4xOSwxLjE0LTIuOTI3LDMuMzIxLTMuMTk2LDUuNTgyYy0wLjQxNC0wLjM0Ny0wLjgyOC0wLjY5My0xLjI0Mi0xLjA0ICAgYy0wLjk4LTAuODIxLTIuNDAyLDAuNTg2LTEuNDE0LDEuNDE1YzAuOTM1LDAuNzgzLDEuODcxLDEuNTY3LDIuODA2LDIuMzUxYzAuNjU4LDAuNTUxLDEuNjc3LDAuMjAzLDEuNzA3LTAuNzA3ICAgYzAuMDczLTIuMTY2LDAuMTc1LTQuNzQyLDIuMzQ4LTUuODczQzIxLjc5Niw0Mi4yOTksMjAuNzg2LDQwLjU3MiwxOS42NDUsNDEuMTY2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LjI5NSw0NS4xNTVjLTEuMzg1LDAuMzIxLTIuOTYxLDIuMDgzLTMuOTM2LDAuMTA2Yy0wLjU2OS0xLjE1NC0yLjI5NS0wLjE0Mi0xLjcyNywxLjAwOSAgIGMwLjUxNywxLjA0OSwxLjUsMS43ODQsMi42NjksMS45MzJjMC41OTQsMC4wNzUsMS4xMzEtMC4wMDksMS42ODgtMC4yMjZjMC40MDktMC4xNTksMS45MzctMS4zMDgsMi4yNjctMC43MTcgICBjMC42MjgsMS4xMjQsMi4zNTYsMC4xMTYsMS43MjctMS4wMDlDMjguNDQ2LDQ1LjI4OCwyNy4zNTksNDQuOTA4LDI2LjI5NSw0NS4xNTV6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CjwvZz48L2c+IDwvc3ZnPg=="/>
                            </span>
                        </div>
                        <div class="index__page-advantages-text">
                            <div class="index__page-advantages-title">Работаем прозрачно</div>
                            <p>Поедоставляем всю информацию о затратах и расходе времени</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="index__page-services">
            <div class="sec-title centered">
                <h2 class="title">Предоставляемые услуги</h2>
            </div>
            <div class="services__list-list">
                @for ($i = 0; $i < 6; $i++)
                    <div class="services__list-item">
                        <div class="services__list-item-name">Электромонтажные работы</div>
                        <div class="services__list-item-description">
                            <div class="services__list-item-price">
                                <span class="before">От</span>
                                <span class="type">р</span>
                                <span class="price">20</span>
                                <span class="unit">м²</span>
                            </div>
                            <div class="services__list-item-description-text">
                                Электромонтажные работы в Москве должен выполнять профессионал с узкопрофильными
                                знаниями и богатым опытом.
                            </div>
                        </div>
                        <div class="services__list-item-btn">
                            <a href="/services/electro" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        @include('includes.formCallback')

        <div class="index__page-portfolio">
            <div class="sec-title centered">
                <h3 class="title">Наши работы</h3>
            </div>
            <div class="portfolio__list-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portfolio__list-item">
                            <a href="/portfolio/item" class="project-img text-center"
                               style="background-image: url({{Storage::url('/portfolio/sdfbd2f.jpg')}});">

                            </a>
                            <div class="desc row align-items-center">
                                <h3>
                                    <div class="float-left">
                                        <a href="/portfolio/item">Cемейный дом</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="/portfolio/item" class="text-main">
                                            Подробнее
                                        </a>
                                    </div>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio__list-item">
                            <a href="/portfolio/item" class="project-img text-center"
                               style="background-image: url({{Storage::url('/portfolio/sdfbd2f.jpg')}});">

                            </a>
                            <div class="desc row align-items-center">
                                <h3>
                                    <div class="float-left">
                                        <a href="/portfolio/item">Кухня</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="/portfolio/item" class="text-main">
                                            Подробнее
                                        </a>
                                    </div>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio__list-item">
                            <a href="/portfolio/item" class="project-img text-center"
                               style="background-image: url({{Storage::url('/portfolio/sdfbd2f.jpg')}});">

                            </a>
                            <div class="desc row align-items-center">
                                <h3>
                                    <div class="float-left">
                                        <a href="/portfolio/item">Ванная комната</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="/portfolio/item" class="text-main">
                                            Подробнее
                                        </a>
                                    </div>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio__list-item">
                            <a href="/portfolio/item" class="project-img text-center"
                               style="background-image: url({{Storage::url('/portfolio/sdfbd2f.jpg')}});">

                            </a>
                            <div class="desc row align-items-center">
                                <h3>
                                    <div class="float-left">
                                        <a href="/portfolio/item">СОВРЕМЕННАЯ КВАРТИРА</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="/portfolio/item" class="text-main">
                                            Подробнее
                                        </a>
                                    </div>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.howWork')

    </div>


@endsection
