
    async function verPersona(id) {
      try {
        const response = await fetch(`https://swapi.py4e.com/api/people/${id}/`);
        const data = await response.json();
        alert("Persona: " + data.name);
      } catch (error) {
        console.error("Error al obtener la persona:", error);
      }
    }

    async function verPlaneta(id) {
      try {
        const response = await fetch(`https://swapi.py4e.com/api/planets/${id}/`);
        const data = await response.json();
        alert("Planeta: " + data.name);
      } catch (error) {
        console.error("Error al obtener el planeta:", error);
      }
    }

    async function verNave(id) {
      try {
        const response = await fetch(`https://swapi.py4e.com/api/starships/${id}/`);
        const data = await response.json();
        alert("Nave: " + data.name);
      } catch (error) {
        console.error("Error al obtener la nave:", error);
      }
    }
 

