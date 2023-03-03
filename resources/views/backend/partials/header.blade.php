<header class="app-header">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <a class="app-header__logo" href="#">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="text" id="search" placeholder="Search" onkeypress="searchFunction(this.value)" onkeydown="searchFunction(this.value)" onkeyup="searchFunction(this.value)" onchange="searchFunction(this.value)" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>

        <!-- User Menu-->
        <li class="dropdown">

                    <a class=" app-nav__item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i> </a>

        </li>
    </ul>
</header>



<script>
function searchFunction(value) {
    var keyword = value;
    keyword = keyword.toUpperCase();
    var table_3 = document.getElementById("sampleTable");
    var all_tr = table_3.getElementsByTagName("tr");
    for(var i=0; i<all_tr.length; i++){
            var all_columns = all_tr[i].getElementsByTagName("td");
            for(j=0;j<all_columns.length; j++){
                if(all_columns[j]){
                    var column_value = all_columns[j].textContent || all_columns[j].innerText;
                    column_value = column_value.toUpperCase();
                    if(column_value.indexOf(keyword) > -1){
                        all_tr[i].style.display = ""; // show
                        break;
                    }else{
                        all_tr[i].style.display = "none"; // hide
                    }
                }
            }
        }
}
    </script>

