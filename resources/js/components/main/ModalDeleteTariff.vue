<template>
  <div class="modal fade" id="modal-tariff-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Внимание</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
           <p>Вы действительно хотите удалить тфриф "{{tariffItem.name}}"?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" v-on:click.prevent="deleteTariff">Удалить</button>
          <button class="btn btn-outline-secondary" v-on:click.prevent="cancelEditTariff">Отмена</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['tariffItem'],
    methods: {
      deleteTariff() {

      },
      cancelEditTariff() {
        $('#modal-tariff-delete').modal('hide');
      }
    }
  }
</script>
