<template>
    <div>
    <ul class="nav flex-row collapse navbar-collapse" id="admin-options">

        <li class="nav-item active">
            <a href="" class="nav-link hoverNav font-weight-bolder ">Most visited</a>
        </li>
        <li class="nav-item">
            <a :href="'search/'" class="nav-link hoverNav font-weight-bolder">Recently added</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" disabled>Last day</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" disabled>Discount</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link hoverNav font-weight-bolder">Last updated</a>
        </li>

    </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
            var header = document.getElementById("admin-options");
            var btns = header.getElementsByClassName("nav-item");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        }
    }

    // console.log('active');
    // var header = document.getElementById("admin-options");
    // var btns = header.getElementsByClassName("nav-item");
    // for (var i = 0; i < btns.length; i++) {
    //     btns[i].addEventListener("click", function() {
    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace(" active", "");
    //         this.className += " active";
    //     });
    // }
</script>
<style>
    /* Style the buttons */
    #admin-options .nav-item {
        border: none;
        outline: none;
        /*padding: 10px 16px;*/
        background-color: indianred;
        cursor: pointer;
        font-size: 18px;
    }

    /* Style the active class, and buttons on mouse-over */
    .active, .nav-item:hover {
        background-color: indianred;
        color: white;
    }
</style>