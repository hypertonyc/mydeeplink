<template>
  <div>
    <div class="block">
      <h2>Создать новый тариф</h2>
      <div class="form-group">
        <label for="instagram-profile">Введите наименование тарифа:</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Новый тариф" aria-label="Тариф" id="instagram-profile" v-model="newTariffName">
        </div>
      </div>
      <button type="button" class="btn btn-primary" v-on:click.prevent="onCreateTariff">Создать тариф</button>
    </div>
    <div class="block">
      <h2>Мои тарифы</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Описание</th>
            <th scope="col">Количество дней</th>
            <th scope="col">Цена</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(tariff, idx) in tariffs" v-bind:key="tariff.id">
            <th scope="row">{{idx + 1}}</th>
            <td>
              <p><strong>{{tariff.name}}</strong></p>
              <p><a href="#" v-on:click.prevent="onRenameClick(deeplink)"><i class="far fa-edit"></i>&nbsp;Изменить название</a></p>
              <p><a href="#" class="text-danger" v-on:click.prevent="onDeleteClick(deeplink)"><i class="far fa-trash-alt"></i>&nbsp;Удалить диплинк</a></p>
            </td>
            <td>{{tariff.description}}</td>
            <td>{{tariff.value}}</td>
            <td>{{tariff.price}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <modalemptytariff></modalemptytariff>
    <modaledittariff v-bind:tariffItem="currentTariff" v-on:update="onTariffUpdate"></modaledittariff>
    <modaldeletetariff v-bind:tariffItem="currentTariff" v-on:update="onTariffDelete"></modaldeletetariff>
  </div>
</template>

<script>
  import modalemptytariff from './ModalEmptyTariff.vue';
  import modaledittariff from './ModalEditTariff.vue';
  import modaldeletetariff from './ModalDeleteTariff.vue';

  export default {
    props: ['currentUser'],
    data() {
      return {
        newTariffName: '',
        currentTariff: {},
        tariffs: []
      }
    },
    methods: {
      getDeeplinks() {
        // axios.get('/api/deeplink')
        // .then(response => {
        //   this.deeplinks = response.data.deeplinks
        // });
      },
      onCreateTariff() {
        if(this.newTariffName)
        {
          $('#modal-tariff').modal('show');
        }
        else
        {
          $('#modal-tariff-empty').modal('show');
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
      'modalemptytariff': modalemptytariff,
      'modaledittariff': modaledittariff,
      'modaldeletetariff': modaldeletetariff
    }
  }
</script>
