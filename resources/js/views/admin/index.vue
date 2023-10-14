<template>
    <div>
      <h1>Role: {{ profile.role }}</h1>
    </div>
  </template>
  <script>
  export default {
    data() {
      return {
        profile: {
          user_name: null,
          role: null,
        },
      };
    },
    async created() {
      // Call the getProfile function to fetch the user profile
      await this.getProfile();
    },
    methods: {
      async getProfile() {
        // Assuming that you have an asynchronous method to fetch the user profile
        try {
          const response = await axios.get('/api/user');
          const data = response.data;

          this.profile.role = data.data.name;
        } catch (error) {
          console.error("Error fetching user profile:", error);
        }
      },
    },
  };
  </script>
