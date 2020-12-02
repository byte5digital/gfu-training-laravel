<template>
  <div class="container">
    <div
      class="row justify-content-center"
      v-for="blog in blogs"
      v-bind:key="blog.id"
    >
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ blog.blog_headline }}</div>

          <div class="card-body">
            {{ blog.blog_content }}
          </div>
          <div class="card-footer" v-if="blog.blog_user">
            {{ blog.blog_user.username }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios.get("/api/blog").then(({ data }) => {
      this.blogs = data.data;
    });
  },
  data() {
    return {
      blogs: [],
    };
  },
};
</script>
