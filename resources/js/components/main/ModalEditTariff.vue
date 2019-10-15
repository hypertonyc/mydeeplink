<template>
  <div class="modal fade" id="modal-tariff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Настройка тарифа</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 control-label">Наименование:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" v-model="tariffItem.name">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Описание:</label>
              <div class="col-sm-12">
                <textarea class="form-control" v-model="tariffItem.description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Количество дней:</label>
              <div class="col-sm-12">
                <input type="number" min="1" max="365" class="form-control" v-model="tariffItem.value">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Цена:</label>
              <div class="col-sm-12">
                <input type="number" min="1" max="99999999" step="0.01" class="form-control" v-model="tariffItem.price">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" v-on:click.prevent="updateTariff">Сохранить</button>
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
      updateTariff() {

      },
      cancelEditTariff() {
        $('#modal-tariff').modal('hide');
      }
    }
  }
</script>
