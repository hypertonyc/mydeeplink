<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Главная</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links" aria-selected="false">Диплинки</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="statistics-tab" data-toggle="tab" href="#statistics" role="tab" aria-controls="statistics" aria-selected="false">Статистика</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="false">Оплата</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Тех. поддержка</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"><main-page-profile v-bind:currentUser="user"></main-page-profile></div>
                <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab"><main-page-links v-bind:currentUser="user"></main-page-links></div>
                <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab"><main-page-statistics v-bind:currentUser="user"></main-page-statistics></div>
                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">payments</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">contact</div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          user: {}
        }
      },
      methods: {
        getInitData() {
          axios.get('/api/user')
          .then(response => {
            this.user = response.data.user
          });
        }
      },
      created() {
        this.getInitData();
      }
    }
</script>
