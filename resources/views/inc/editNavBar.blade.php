<nav class="navbar navbar-default" role="navigation" id="editNav">
    <div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="top-navbar-1">
            <div class="row">
                <div class="col-xs-3">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('home/albums/'.$image->album_id)}}"> <i class="glyphicon glyphicon-triangle-left"></i> <span class="carret">Album</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-9">
                    <div id="imgEditButton" class="btn-group btn-justified pull-right">
                        <a class="btn btn-default btn-primary " href="#">Download</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
