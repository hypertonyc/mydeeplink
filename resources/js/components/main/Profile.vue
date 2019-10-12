<template>
  <div>
    <div class="block">
      <h2>Аккаунт</h2>
      <p class="h5">Email: hypertonyc@mail.ru</p>
      <div class="row">
        <div class="col-md-12">
          <!--<input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
          <button type="button" class="btn btn-outline-secondary">Изменить пароль</button>
        </div>
      </div>
    </div>
    <div class="block">
      <h2>Тариф</h2>
      <p class="h5">Текущий тариф: <a href="#">Бесплатный</a></p>
      <p class="h5">Оплачен до: <a href="#">8 ноября</a></p>
      <p class="h5">Тарифные клики: <a href="#">500</a></p>
    </div>
    <div class="block">
      <h2>Уведомления</h2>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cb-email-tarif">
        <label class="form-check-label" for="cb-email-tarif">
          Отправлять email, когда заканчивается действие тарифного плана
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cb-email-news">
        <label class="form-check-label" for="cb-email-news">
          Отправлять email с новостями сервиса 
        </label>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
