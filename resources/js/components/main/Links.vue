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
          <input type="text" class="form-control" placeholder="tourism.smm" aria-label="Профиль" aria-describedby="basic-addon1" id="instagram-profile">
        </div>
        <small id="profile-note" class="form-text text-muted">Необходимо ввести профиль, на который Вы будете вести трафик Вашей рекламной кампании</small>
      </div>
      <button type="submit" class="btn btn-primary">Сгенерировать ссылку</button>
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
          <tr>
            <th scope="row">1</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><a href="#">Изменить название</a></p>
            </td>
            <td>
              <p><strong><a href="#">https://deeplinkr.com/gqDeq57</a></strong></p>
              <p><a href="#">Скопировать</a></p>
            </td>
            <td>@hypertonyc</td>
            <td>
              <p><strong>Всего кликов: 0</strong></p>
              <p><small>Уникальных: 0</small></p>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><a href="#">Изменить название</a></p>
            </td>
            <td>
              <p><strong><a href="#">https://deeplinkr.com/gqDeq57</a></strong></p>
              <p><a href="#">Скопировать</a></p>
            </td>
            <td>@hypertonyc</td>
            <td>
              <p><strong>Всего кликов: 0</strong></p>
              <p><small>Уникальных: 0</small></p>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><a href="#">Изменить название</a></p>
            </td>
            <td>
              <p><strong><a href="#">https://deeplinkr.com/gqDeq57</a></strong></p>
              <p><a href="#">Скопировать</a></p>
            </td>
            <td>@hypertonyc</td>
            <td>
              <p><strong>Всего кликов: 0</strong></p>
              <p><small>Уникальных: 0</small></p>
            </td>
          </tr>
        </tbody>
      </table>
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
