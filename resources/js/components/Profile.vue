<style>
.widget-user-header {
  background-position: center center;
  background-size: cover;
}
#test {
  height: 150px;
}
.active-class {
  background-color: blue;
}
</style>


<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-3">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div
            class="widget-user-header text-white"
            id="test"
            style="background-image: url('./img/user.jpg')"
          >
            <h3 class="widget-user-username">Elizabeth Pierce</h3>
            <h5 class="widget-user-desc">Web Designer</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="#" alt="User Avatar" />
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link" href="#activity" data-toggle="tab">Activity</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
            </li>
          </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="/img/profile.jpg" alt="user image" />
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                    <a href="#" class="float-right btn-tool">
                      <i class="fas fa-times"></i>
                    </a>
                  </span>
                  <span class="description">Shared publicly - 7:30 PM today</span>
                </div>
                <!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <p>
                  <a href="#" class="link-black text-sm mr-2">
                    <i class="fas fa-share mr-1"></i> Share
                  </a>
                  <a href="#" class="link-black text-sm">
                    <i class="far fa-thumbs-up mr-1"></i> Like
                  </a>
                  <span class="float-right">
                    <a href="#" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Comments (5)
                    </a>
                  </span>
                </p>

                <input
                  class="form-control form-control-sm"
                  type="text"
                  placeholder="Type a comment"
                />
              </div>
              <!-- /.post -->

              <!-- Post -->

              <!-- /.post -->

              <!-- Post -->

              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-8 control-label">Name</label>

                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputName" placeholder="Name" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-8 control-label">Email</label>

                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName2" class="col-sm-8 control-label">Name</label>

                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputName2" placeholder="Name" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-8 control-label">Experience</label>

                  <div class="col-md-8">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-8 control-label">Skills</label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-md-8">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" /> I agree to the
                        <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activeMode: false
    };
  },
  methods: $(function() {
    $("body").on("click", ".list-group-item", function() {
      $(".list-group-item").removeClass("active");
      $(this)
        .closest(".list-group-item")
        .addClass("active");
    });
  }),
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
