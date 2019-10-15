<template>
  <div>
    <div class="block">
      <h2>Параметры</h2>
      <label>Период:</label>
      <div class="row">
        <div class='col-md-12'>
          <button class="btn btn-outline-primary btn-sm" v-on:click.prevent="setDate(0)">Сегодня</button>&nbsp;
          <button class="btn btn-outline-primary btn-sm" v-on:click.prevent="setDate(1)">Вчера</button>&nbsp;
          <button class="btn btn-outline-primary btn-sm" v-on:click.prevent="setDate(2)">Неделя</button>&nbsp;
          <button class="btn btn-outline-primary btn-sm" v-on:click.prevent="setDate(3)">Месяц</button>
        </div>
      </div>
      <div class="row">
        <div class='col-md-12 mt-2'></div>
      </div>
      <div class="row">
        <div class='col-md-5'>
          <datepicker v-model="fromDate" :language="calendarRu" :calendar-button-icon="calendarIcon" :format="calendarFormat" :calendar-button="true" :bootstrap-styling="true" :input-class="calendarClass"></datepicker>
        </div>
        <div class='col-md-5'>
          <datepicker v-model="toDate" :language="calendarRu" :calendar-button-icon="calendarIcon" :format="calendarFormat" :calendar-button="true" :bootstrap-styling="true" :input-class="calendarClass"></datepicker>
        </div>
        <div class='col-md-2'>
          <button v-on:click.prevent="getClicksInfo" class="btn btn-primary">Сформировать</button>
        </div>
      </div>
    </div>
    <div class="block">
      <h2>Переходы по диплинкам</h2>
      <transition name="fade" mode="out-in">
        <table v-if="!loading" class="table table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Ссылка</th>
              <!--
              <th scope="col">Пользователь</th>
              -->
              <th scope="col">Платформа</th>
              <th scope="col">Гео</th>
              <th scope="col">Дата</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(click, idx) in clicks" v-bind:key="click.id">
              <th scope="row" class="align-middle">{{idx + 1}}</th>
              <td>
                <p>{{getDeeplinkName(click.deeplink_id)}}</p>
                <p><small>@{{getDeeplinkProfile(click.deeplink_id)}}</small></p>
              </td>
              <!--
              <td>
                <p>Пользователь #322</p>
              </td>
              -->
              <td class="align-middle" v-html="getPlatformHtml(click.platform)"></td>
              <td>
                <p>{{click.city}}</p>
                <p><small>{{click.country}}</small></p>
              </td>
              <td class="align-middle">{{click.created_at}}</td>
            </tr>
          </tbody>
        </table>
        <div v-else class="container">
          <div class="row">
            <div class='col-md-12'>
              <p>&nbsp;</p>
            </div>
          </div>
          <div class="row">
            <div class='col-md-12'>
              <p class="h5 text-center"><i class="far fa-compass fa-spin"></i>&nbsp;Загрузка...</p>
            </div>
          </div>
          <div class="row">
            <div class='col-md-12'>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';
  import {en,ru} from 'vuejs-datepicker/dist/locale';

  export default {
    props: ['currentUser'],
    data () {
      return {
        calendarEn: en,
        calendarRu: ru,
        calendarIcon: 'far fa-calendar-alt',
        calendarClass: 'bg-white text-dark',
        calendarFormat: 'dd.MM.yyyy',
        fromDate: new Date(),
        toDate: new Date(),
        loading: true,
        clicks: []
      }
    },
    components: {
      Datepicker
    },
    methods: {
      setDate(type) {
        this.toDate = new Date();

        switch(type)
        {
          case 0:
            this.fromDate = new Date();
            break;
          case 1:
            this.fromDate = new Date();
            this.fromDate.setDate(this.fromDate.getDate() - 1);
            break;
          case 2:
            this.fromDate = new Date();
            this.fromDate.setDate(this.fromDate.getDate() - 7);
            break;
          case 3:
            this.fromDate = new Date();
            this.fromDate.setDate(this.fromDate.getDate() - 30);
            break;
        }
      },
      getClicksInfo() {
        var input = {
          'from': this.fromDate,
          'to': this.toDate
        };

        this.loading = true;
        axios.get('/api/click',{params: input})
        .then(response => {
          this.clicks = response.data.clicks;
          this.loading = false;
        });
      },
      getDeeplinkName(ADeeplinkID) {
        var deeplinks = this.currentUser.deeplinks;

        for(var i=0; i<deeplinks.length; i++)
        {
          if(deeplinks[i].id == ADeeplinkID)
          {
            return deeplinks[i].name;
          }
        }
        return '';
      },
      getDeeplinkProfile(ADeeplinkID) {
        var deeplinks = this.currentUser.deeplinks;

        for(var i=0; i<deeplinks.length; i++)
        {
          if(deeplinks[i].id == ADeeplinkID)
          {
            return deeplinks[i].instagram;
          }
        }
        return '';
      },
      getPlatformHtml: function (APlatform) {
        var result = '<i class="fas fa-desktop"></i>&nbsp;Компьютер';

        switch(APlatform)
        {
          case 1:
            result = '<i class="fab fa-apple"></i>&nbsp;iPhone';
            break;
          case 2:
            result = '<i class="fab fa-android"></i>&nbsp;Android';
            break;
        }

        return result;
      }
    },
    created() {
      this.fromDate.setDate(this.fromDate.getDate() - 7);
      this.getClicksInfo();
    }
  }
</script>
