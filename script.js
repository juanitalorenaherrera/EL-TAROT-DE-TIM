const cartas_significados = {
    "arcanos_mayores": [
        {
            "nombre": "El Loco",
            "significado_upright": "Comienzos, espontaneidad, aventuras, potencial ilimitado.",
            "significado_reversed": "Imprudencia, irresponsabilidad, miedo al cambio, indecisión.",
            "descripcion": "El Loco representa el inicio de un viaje lleno de posibilidades. Es un símbolo de libertad, fe y confianza en lo desconocido."
          },
          {
            "nombre": "El Mago",
            "significado_upright": "Poder personal, acción, habilidad, manifestación de objetivos.",
            "significado_reversed": "Manipulación, ilusiones, falta de acción, habilidades desaprovechadas.",
            "descripcion": "El Mago indica que tienes las herramientas y habilidades necesarias para lograr tus metas. Es un símbolo de creatividad y voluntad."
          },
          {
            "nombre": "La Sacerdotisa",
            "significado_upright": "Sabiduría interior, intuición, misterio, conocimiento oculto.",
            "significado_reversed": "Secretos revelados, desconexión de la intuición, superficialidad.",
            "descripcion": "La Sacerdotisa es un símbolo de sabiduría interior y conexión espiritual. Representa lo oculto y el misterio."
          },
          {
            "nombre": "La Emperatriz",
            "significado_upright": "Abundancia, fertilidad, creatividad, naturaleza, maternidad.",
            "significado_reversed": "Bloqueos creativos, exceso, negligencia.",
            "descripcion": "La Emperatriz encarna la energía creativa y nutritiva. Es un símbolo de fertilidad y abundancia en todas sus formas."
          },
          {
            "nombre": "El Emperador",
            "significado_upright": "Estructura, autoridad, estabilidad, liderazgo.",
            "significado_reversed": "Rigidez, control excesivo, falta de disciplina.",
            "descripcion": "El Emperador representa autoridad y liderazgo. Es un símbolo de estructura y orden en la vida."
          },
          {
            "nombre": "El Sumo Sacerdote",
            "significado_upright": "Tradición, espiritualidad, mentoría, enseñanza.",
            "significado_reversed": "Dogmatismo, rebelión contra las normas, desconexión espiritual.",
            "descripcion": "El Sumo Sacerdote simboliza las enseñanzas espirituales y el valor de las tradiciones."
          },
          {
            "nombre": "Los Enamorados",
            "significado_upright": "Amor, unión, elecciones importantes, armonía.",
            "significado_reversed": "Conflictos, malas decisiones, desequilibrio.",
            "descripcion": "Los Enamorados representan la unión y las decisiones que impactan profundamente la vida."
          },
          {
            "nombre": "El Carro",
            "significado_upright": "Determinación, éxito, control, victoria.",
            "significado_reversed": "Falta de control, agresión, obstáculos.",
            "descripcion": "El Carro simboliza la fuerza de voluntad y el éxito a través de la perseverancia."
          },
          {
            "nombre": "La Justicia",
            "significado_upright": "Equilibrio, verdad, karma, rendición de cuentas.",
            "significado_reversed": "Deshonestidad, injusticia, parcialidad.",
            "descripcion": "La Justicia representa las consecuencias de nuestras acciones y la búsqueda de la verdad."
          },
          {
            "nombre": "El Ermitaño",
            "significado_upright": "Introspección, soledad, sabiduría espiritual.",
            "significado_reversed": "Aislamiento, soledad excesiva, rechazo de la guía.",
            "descripcion": "El Ermitaño simboliza el autoconocimiento y la búsqueda de respuestas dentro de uno mismo."
          },
          {
            "nombre": "La Rueda de la Fortuna",
            "significado_upright": "Cambios, suerte, ciclos, destino.",
            "significado_reversed": "Estancamiento, mala suerte, resistencia al cambio.",
            "descripcion": "La Rueda de la Fortuna indica los ciclos naturales de la vida y la importancia de adaptarse al cambio."
          },
          {
            "nombre": "La Fuerza",
            "significado_upright": "Coraje, autocontrol, compasión, paciencia.",
            "significado_reversed": "Duda, debilidad, falta de control.",
            "descripcion": "La Fuerza simboliza el coraje interior y la capacidad de manejar situaciones difíciles con calma."
          },
          {
            "nombre": "El Colgado",
            "significado_upright": "Perspectiva nueva, sacrificio, pausa, aceptación.",
            "significado_reversed": "Estancamiento, indecisión, resistencia al cambio.",
            "descripcion": "El Colgado indica la necesidad de una nueva perspectiva o de dejar ir el control temporalmente."
          },
          {
            "nombre": "La Muerte",
            "significado_upright": "Transformación, fin de un ciclo, cambio, renacimiento.",
            "significado_reversed": "Resistencia al cambio, estancamiento, miedo.",
            "descripcion": "La Muerte simboliza el final necesario para dar paso a nuevos comienzos y la transformación personal."
          },
          {
            "nombre": "La Templanza",
            "significado_upright": "Equilibrio, moderación, armonía, paciencia.",
            "significado_reversed": "Excesos, falta de equilibrio, impaciencia.",
            "descripcion": "La Templanza representa la necesidad de encontrar armonía y moderación en la vida."
          },
          {
            "nombre": "El Diablo",
            "significado_upright": "Apego, adicciones, materialismo, control.",
            "significado_reversed": "Liberación, conciencia, rompimiento de cadenas.",
            "descripcion": "El Diablo simboliza las ataduras y patrones negativos que nos impiden avanzar."
          },
          {
            "nombre": "La Torre",
            "significado_upright": "Cambio repentino, caos, revelación, colapso.",
            "significado_reversed": "Evitar desastres, miedo al cambio, resistencia.",
            "descripcion": "La Torre representa cambios drásticos y la destrucción de lo que ya no sirve para construir algo nuevo."
          },
          {
            "nombre": "La Estrella",
            "significado_upright": "Esperanza, inspiración, renovación, espiritualidad.",
            "significado_reversed": "Falta de fe, pesimismo, desconexión.",
            "descripcion": "La Estrella simboliza la esperanza y la guía espiritual hacia un camino más iluminado."
          },
          {
            "nombre": "La Luna",
            "significado_upright": "Intuición, sueños, ilusiones, emociones ocultas.",
            "significado_reversed": "Confusión, engaño, claridad emergente.",
            "descripcion": "La Luna representa el mundo emocional y las ilusiones que necesitan ser desveladas."
          },
          {
            "nombre": "El Sol",
            "significado_upright": "Felicidad, éxito, claridad, vitalidad.",
            "significado_reversed": "Depresión, falta de éxito, egocentrismo.",
            "descripcion": "El Sol simboliza la alegría y la claridad que trae el éxito y la verdad."
          },
          {
            "nombre": "El Juicio",
            "significado_upright": "Renacimiento, autoevaluación, despertar, resolución.",
            "significado_reversed": "Duda, falta de cierre, rechazo al cambio.",
            "descripcion": "El Juicio representa la reflexión y la capacidad de tomar decisiones que cambien el rumbo de la vida."
          },
          {
            "nombre": "El Mundo",
            "significado_upright": "Finalización, éxito, logro, plenitud.",
            "significado_reversed": "Incompletud, estancamiento, falta de cierre.",
            "descripcion": "El Mundo simboliza la culminación de un ciclo y la satisfacción que trae alcanzar un objetivo."
          }
    ],
    "arcanos_menores": {
        "numeros": {
            "1": "Es un indicador de nuevos comienzos, oportunidades y potencial.",
            "2": "Simboliza dualidad, equilibrio y colaboración.",
            "3": "Significa creatividad, expresión y comunicación.",
            "4": "Nos indica estabilidad y un pensamiento estructurado.",
            "5": "Puede avisar de cambios y desafíos.",
            "6": "Es un símbolo de armonía, cooperación y reconciliación.",
            "7": "Es la representación de la evaluación, el análisis y la sabiduría interior.",
            "8": "Representa la fuerza, el poder y la superación de obstáculos.",
            "9": "Es un símbolo de logros, culminaciones y éxito.",
            "10": "Se relaciona con la finalización, el cierre y la transformación.",
            "11": "Señala la llegada de noticias y mensajes. También representa la juventud.",
            "12": "Nos indica movimiento, acción y liderazgo.",
            "13": "Está relacionada con la nutrición, la intuición y las emociones.",
            "14": "Es un símbolo de autoridad, responsabilidad y sabiduría.",
        },
        "palos": {
            "1": {
                "palo": "Bastos",
                "significado:": "Representan la creatividad, la pasión y la energía.",
            },
            "2": {
                "palo": "Copas",
                "significado:": "Simbolizan las emociones, los sentimientos y la intuición.",
            },
            "3": {
                "palo": "Espadas",
                "significado:": "Representan la mente, el pensamiento y los desafíos.",
            },
            "4": {
                "palo": "Oros",
                "significado:": "Simbolizan la riqueza, la abundancia y la seguridad material.",
            },
        }
    }
}

const modal = document.getElementById("modal");
const modalTitle = document.getElementById("modal-title");
const modalDescription = document.getElementById("modal-description");
const closeModalBtn = document.getElementById("close-modal");

const obtenerSignificadoDeIndiceCarta = (indice) => {
    if (indice < 22) {
        return cartas_significados.arcanos_mayores[indice];
    } else {
        const {palo, numero} = indiceArcanoMenor(indice);
        const nombre = `${cartas_significados.arcanos_menores.numeros[(numero.toString())]} de ${cartas_significados.arcanos_menores.palos[(palo.toString())]}`;
        const significado_palo = cartas_significados.arcanos_menores.palos[(palo.toString())];
        const significado_numero = cartas_significados.arcanos_menores.numeros[(numero.toString())];
        const descripcion = `Numero: ${significado_numero} \n Palo: ${significado_palo}`;
        return {
            "nombre": nombre,
            "descripcion": descripcion,
        }
    }
}

const range = (start, end) => Array.from({ length: end - start + 1 }, (_, i) => start + i);

const elegirCarta = (cartas_disponibles) => {
    const indice = Math.floor(Math.random() * cartas_disponibles.length);
    const carta = cartas_disponibles.splice(indice, 1)[0];
    return carta;
}

const indiceArcanoMenor = (indice) => {
    palo = Math.floor((indice - 22) / 14) 
    numero = Math.floor((indice - 22) % 14) + 1
    palos = ["Bastos","Copas","Espadas","Oros"]

    return {
        "palo": palos[palo],
        "numero": numero,
    }
}

const presentePasadoFuturo = (cartas_disponibles) => {
    const pasado = elegirCarta(cartas_disponibles);
    cartas_disponibles = cartas_disponibles.filter(carta => carta !== pasado);

    const presente = elegirCarta(cartas_disponibles);
    cartas_disponibles = cartas_disponibles.filter(carta => carta !== presente);
    
    const futuro = elegirCarta(cartas_disponibles);
    // DEBUG: console.log(pasado, presente, futuro);
    return [pasado, presente, futuro];
}

function sacarCartas() {
    const cartas_disponibles = range(0, 77);
    const [pasado, presente, futuro] = presentePasadoFuturo(cartas_disponibles);
    const cartas = [pasado, presente, futuro];
    const cartasDivs = document.getElementsByClassName("carta");
    for (let i = 0; i < cartasDivs.length; i++) {
        const carta = cartas[i];
        const cartaSignificado = obtenerSignificadoDeIndiceCarta(carta);
        const cartaDiv = cartasDivs[i];

        //remove children of cartaDiv
        while (cartaDiv.firstChild) {
            cartaDiv.removeChild(cartaDiv.firstChild);
        }

        let cartaImagen = null
        cartaImagen = document.createElement("img");

        
        console.log("Indice", carta);
        
        if (carta < 22) {
            console.log("Arcano Mayor");
            cartaImagen.src = `imgs/cards/ArcanoMayor${carta}.jpg`;
        } else {
            const {palo, numero} = indiceArcanoMenor(carta);
            console.log(palo, numero);
            cartaImagen.src = `imgs/cards/${palo}${numero}.jpg`;
        }

        cartaImagen.alt = cartaSignificado.nombre;
        cartaImagen.style.width = "auto";
        cartaImagen.style.height = "100%";

        cartaDiv.appendChild(cartaImagen);

        console.log(cartaSignificado);
        console.log(cartaDiv.descripcion)
    }
}

function abrirModal(carta) {
    modalTitle.innerText = carta.nombre;
    modalDescription.innerText = carta.significado;
    modal.style.display = "flex";
}

closeModalBtn.onclick = function() {
    modal.style.display = "none";
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

function calcularFaseLunar() {
    const diasDesdeLunaNueva = Math.floor((new Date() - new Date("2023-01-22")) / (1000 * 60 * 60 * 24));
    const cicloLunar = 29.53;
    const fase = diasDesdeLunaNueva % cicloLunar;
    const fases = ["Luna Nueva", "Cuarto Creciente", "Luna Llena", "Cuarto Menguante"];
    let faseActual;

    if (fase < 7.4) {
        faseActual = fases[0];
    } else if (fase < 14.8) {
        faseActual = fases[1];
    } else if (fase < 22.1) {
        faseActual = fases[2];
    } else {
        faseActual = fases[3];
    }

    document.getElementById("fase-lunar").innerText = `Fase Lunar: ${faseActual}`;
}

document.addEventListener("DOMContentLoaded", () => {
    calcularFaseLunar();
    sacarCartas();
});

document.getElementById('astro-form').addEventListener('submit', function (e) {
  e.preventDefault();
  
  const nombre = document.getElementById('nombre').value;
  const fechaNacimiento = document.getElementById('fecha-nacimiento').value;
  const horaNacimiento = document.getElementById('hora-nacimiento').value;
  const lugarNacimiento = document.getElementById('lugar-nacimiento').value;
  
  // Aquí puedes integrar una API para procesar los datos
  const resultado = `
      <h3>Tu Carta Astral</h3>
      <p><strong>Nombre:</strong> ${nombre}</p>
      <p><strong>Fecha de Nacimiento:</strong> ${fechaNacimiento}</p>
      <p><strong>Hora de Nacimiento:</strong> ${horaNacimiento}</p>
      <p><strong>Lugar de Nacimiento:</strong> ${lugarNacimiento}</p>
      <p>✨ Aquí se mostrará tu carta astral completa cuando se integre la API.</p>
  `;
  
  document.getElementById('resultado-carta').innerHTML = resultado;
});

