<template>
  <div>
    <div class="block">
      <h2>Параметры</h2>
      <label>Период:</label>
      <div class="row">
        <div class='col-md-5'>
          <datepicker :language="calendarRu" :calendar-button-icon="calendarIcon" :format="calendarFormat" :calendar-button="true" :bootstrap-styling="true" :typeable="true"></datepicker>
        </div>
        <div class='col-md-5'>
          <datepicker :language="calendarRu" :calendar-button-icon="calendarIcon" :format="calendarFormat" :calendar-button="true" :bootstrap-styling="true" :typeable="true"></datepicker>
        </div>
        <div class='col-md-2'>
          <button type="submit" class="btn btn-primary">Сформировать</button>
        </div>
      </div>
    </div>
    <div class="block">
      <h2>Переходы по диплинкам</h2>
      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ссылка</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Платформа</th>
            <th scope="col">Гео</th>
            <th scope="col">Дата</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><small>@hypertonyc</small></p>
            </td>
            <td>
              <p>Пользователь #322</p>
            </td>
            <td>Android</td>
            <td>
              <p><strong>Samara</strong></p>
              <p><small>Russian Federation</small></p>
            </td>
            <td>21.11.2019 10:23:23</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><small>@hypertonyc</small></p>
            </td>
            <td>
              <p>Пользователь #322</p>
            </td>
            <td>Android</td>
            <td>
              <p><strong>Samara</strong></p>
              <p><small>Russian Federation</small></p>
            </td>
            <td>21.11.2019 10:23:23</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>
              <p>Мойдипоинк суперский</p>
              <p><small>@hypertonyc</small></p>
            </td>
            <td>
              <p>Пользователь #322</p>
            </td>
            <td>Android</td>
            <td>
              <p><strong>Samara</strong></p>
              <p><small>Russian Federation</small></p>
            </td>
            <td>21.11.2019 10:23:23</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';
  import {en,ru} from 'vuejs-datepicker/dist/locale';

  export default {
    data () {
        return {
          calendarEn: en,
          calendarRu: ru,
          calendarIcon: 'far fa-calendar-alt',
          calendarFormat: 'dd.MM.yyyy'
        }
    },
    components: {
      Datepicker
    },
    mounted() {
        console.log('Component mounted.')
    }
  }
</script>
