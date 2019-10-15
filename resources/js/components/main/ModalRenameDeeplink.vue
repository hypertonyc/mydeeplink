<template>
  <div class="modal fade" id="modal-deeplink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Настройка диплинка</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 control-label">Наименование:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" v-model="deeplinkItem.name">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" v-on:click.prevent="updateDeeplink(deeplinkItem)">Сохранить</button>
          <button class="btn btn-outline-secondary" v-on:click.prevent="cancelEditDeeplink">Отмена</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['deeplinkItem'],
    methods: {
      updateDeeplink(deeplinkItem) {
        var input = {
          id: AId,
          name: 'aaaa'
        };

        axios.put('/api/deeplink', input)
        .then(response => {
          this.getDeeplinks();
        });

        // var input = sensorItem;
        //
        // axios.put('/api/deeplink', input)
        // .then(response => {
        //   $('#modal-sensor').modal('hide');
        //   //toastr.success('Изменения по датчику сохранены.', 'Изменения приняты', {timeout:5000});
        //   this.$emit('update', input);
        // })
        // .catch(e => {
        //   //toastr.error(e, 'Произошла ошибка', {timeout:5000});
        // });
      },
      cancelEditDeeplink() {
        $('#modal-deeplink').modal('hide');
      }
    }
  }
</script>
