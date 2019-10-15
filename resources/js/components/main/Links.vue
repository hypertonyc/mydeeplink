<template>
  <div>
    <div class="block">
      <h2>Создать новый диплинк</h2>
      <div class="form-group">
        <label for="instagram-profile">Введите профиль Instagram:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" class="form-control" placeholder="tourism.smm" aria-label="Профиль" aria-describedby="basic-addon1" id="instagram-profile" v-model="newProfile">
        </div>
        <small id="profile-note" class="form-text text-muted">Необходимо ввести профиль, на который Вы будете вести трафик Вашей рекламной кампании</small>
      </div>
      <button type="button" class="btn btn-primary" v-on:click.prevent="onCreateDeeplink">Сгенерировать ссылку</button>
    </div>
    <div class="block">
      <h2>Мои диплинки</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Ссылка</th>
            <th scope="col">Профиль</th>
            <th scope="col">Клики</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(deeplink, idx) in currentUser.deeplinks" v-bind:key="deeplink.id">
            <th scope="row">{{idx + 1}}</th>
            <td>
              <p><strong>{{deeplink.name}}</strong></p>
              <p><a href="#" v-on:click.prevent="onRenameClick(deeplink)"><i class="far fa-edit"></i>&nbsp;Изменить название</a></p>
              <p><a href="#" class="text-danger" v-on:click.prevent="onDeleteClick(deeplink)"><i class="far fa-trash-alt"></i>&nbsp;Удалить диплинк</a></p>
            </td>
            <td>
              <p><strong><a :href="deeplink.url">{{deeplink.url}}</a></strong></p>
              <p><a href="#" v-on:click.prevent="onCopyUrl(deeplink.url)"><i class="far fa-copy"></i>Скопировать</a></p>
            </td>
            <td><strong>@{{deeplink.instagram}}</strong></td>
            <td>
              <p><strong>Всего кликов: 0</strong></p>
              <p><small>Уникальных: 0</small></p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <modalemptydeeplink></modalemptydeeplink>
    <modalrenamedeeplink v-bind:deeplinkItem="currentDeeplink" v-on:update="onDeeplinkUpdate"></modalrenamedeeplink>
    <modaldeletedeeplink v-bind:deeplinkItem="currentDeeplink" v-on:update="onDeeplinkDelete"></modaldeletedeeplink>
  </div>
</template>

<script>
  import modalemptydeeplink from './ModalEmptyDeeplink.vue';
  import modalrenamedeeplink from './ModalRenameDeeplink.vue';
  import modaldeletedeeplink from './ModalDeleteDeeplink.vue';

  export default {
    props: ['currentUser'],
    data() {
      return {
        newProfile: '',
        currentDeeplink: {},
        deeplinks: []
      }
    },
    methods: {
      getDeeplinks() {
        // axios.get('/api/deeplink')
        // .then(response => {
        //   this.deeplinks = response.data.deeplinks
        // });
      },
      onCreateDeeplink() {
        if(this.newProfile)
        {
          var input = {
            instagramProfile: this.newProfile
          };

          axios.post('/api/deeplink', input)
          .then(response => {
            this.newProfile = '';
            this.getDeeplinks();
          });
        }
        else
        {
          $('#modal-deeplink-empty').modal('show');
        }
      },
      onRenameClick(ADeeplink) {
        this.currentDeeplink = JSON.parse(JSON.stringify(ADeeplink));
        $('#modal-deeplink').modal('show');
      },
      onDeleteClick(ADeeplink) {
        this.currentDeeplink = JSON.parse(JSON.stringify(ADeeplink));
        $('#modal-deeplink-delete').modal('show');
      },
      onDeeplinkUpdate(ADeeplink) {

      },
      onDeeplinkDelete(ADeeplink) {

      },
      onCopyUrl(AUrl) {
        this.CopyTextToClipboard(AUrl);
        this.$toastr.s("Ссылка успешно скопирована в буфер обмена","Ссылка скопирована!");
      },
      CopyTextToClipboard(Atext) {
        var textArea = document.createElement("textarea");

        textArea.style.position = 'fixed';
        textArea.style.top = 0;
        textArea.style.left = 0;
        textArea.style.width = '2em';
        textArea.style.height = '2em';
        textArea.style.padding = 0;
        textArea.style.border = 'none';
        textArea.style.outline = 'none';
        textArea.style.boxShadow = 'none';
        textArea.style.background = 'transparent';
        textArea.value = Atext;

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
          var successful = document.execCommand('copy');
          // toastr success
        } catch (err) {
          // toastr error
        }

        document.body.removeChild(textArea);
      }
    },
    components: {
      'modalemptydeeplink': modalemptydeeplink,
      'modalrenamedeeplink': modalrenamedeeplink,
      'modaldeletedeeplink': modaldeletedeeplink
    }
  }
</script>
