<template>
  <div>
    <div class="block">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Текущий тариф</h2>
            <p class="h5">Текущий тариф: <a href="#" v-on:click.prevent="openPayments">Бесплатный</a></p>
            <p class="h5">Дата блокировки: <a href="#" v-on:click.prevent="openPayments">8 ноября</a></p>
          </div>
          <div class="col-md-6">
            <h2>Оплатить тариф</h2>
            <div class="form-group">
              <label for="tariff-select">Выберите тариф:</label>
              <select class="form-control" id="tariff-select">
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="payment-type">Выберите способ оплаты:</label>
              <select class="form-control" id="payment-type">
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <div class="form-group">
              <p class="h3">Итого:&nbsp;500.<small>00</small>&nbsp;руб.</p>
            </div>
            <div class="form-group">
              <button class="btn btn-success">Перейти к оплате</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>История оплат</h2>
            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Дата</th>
                  <th scope="col">Тариф</th>
                  <th scope="col">Сумма</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(deeplink, idx) in currentUser.deeplinks" v-bind:key="deeplink.id">
                  <th scope="row">{{idx + 1}}</th>
                  <td>
                    <p><strong>{{deeplink.name}}</strong></p>
                  </td>
                  <td>
                    <p><strong><a :href="deeplink.url" target="_blank">{{deeplink.url}}</a></strong></p>
                  </td>
                  <td><strong>@{{deeplink.instagram}}</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['currentUser'],
    methods: {
      openPayments() {
        $('#myTab a[href="#payments"]').tab('show');
      }
    }
  }
</script>
