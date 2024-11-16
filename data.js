// Arquivo: data.js

// Lista de participantes inicial
let participants = [
  { id: 1, name: "Valto", paid: false },
  { id: 2, name: "Eldo", paid: false },
  { id: 3, name: "Kenildo", paid: false }
];

// Função para obter os participantes
function getParticipants() {
  return participants;
}

// Função para adicionar um participante
function addParticipant(name) {
  // Evita duplicatas (case insensitive)
  if (participants.some(participant => participant.name.toLowerCase() === name.toLowerCase())) {
    alert("Este nome já existe na lista!");
    return;
  }

  const newParticipant = {
    id: participants.length + 1,
    name: name,
    paid: false
  };
  participants.push(newParticipant);
  alert("Participante adicionado com sucesso!");
}

// Função para editar um participante
function editParticipant(id, newName, newStatus) {
  const participant = participants.find(participant => participant.id === id);
  if (participant) {
    participant.name = newName;
    participant.paid = newStatus;
  }
}

// Exportando funções para serem usadas no HTML
if (typeof module !== "undefined") {
  module.exports = { getParticipants, addParticipant, editParticipant };
}
