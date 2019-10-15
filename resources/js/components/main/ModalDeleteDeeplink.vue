<template>
  <div class="modal fade" id="modal-deeplink-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Внимание</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
           <p>Вы действительно хотите удалить диплинк "{{deeplinkItem.name}}" для профиля @{{deeplinkItem.instagram}}?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" v-on:click.prevent="updateDeeplink(deeplinkItem)">Удалить</button>
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
        $('#modal-deeplink-delete').modal('hide');
      }
    }
  }
</script>
