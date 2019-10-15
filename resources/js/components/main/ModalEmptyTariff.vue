<template>
  <div class="modal fade" id="modal-tariff-empty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Внимание</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
           <p>Необходимо ввести наименование тарифа!</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" v-on:click.prevent="onOkClick">Ок</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['tariffItem'],
    methods: {
      onOkClick() {
        $('#modal-tariff-empty').modal('hide');
      }
    }
  }
</script>
