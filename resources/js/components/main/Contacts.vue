<template>
  <div>
    <div class="block">
      <h2>Контакты</h2>
      <p class="h5">Whatsapp:&nbsp;Бесплатный</p>
      <p class="h5">Instagram:&nbsp;Бесплатный</p>
      <p class="h5">Telegram:&nbsp;Бесплатный</p>
      <p class="h5">Email:&nbsp;Бесплатный</p>
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
