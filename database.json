const databaseKey = "participantsData";

// Função para carregar participantes do localStorage ou JSON base
function loadParticipants() {
  let participants = JSON.parse(localStorage.getItem(databaseKey));
  if (!participants) {
    participants = [
      { name: "Valto", paid: false },
      { name: "Eldo", paid: false },
      { name: "Kenildo", paid: false }
    ];
    saveParticipants(participants); // Salva no localStorage
  }
  return participants;
}

// Função para salvar participantes no localStorage
function saveParticipants(participants) {
  localStorage.setItem(databaseKey, JSON.stringify(participants));
}

// Função para verificar duplicidade de nome
function isDuplicateName(participants, name, excludeIndex = -1) {
  return participants.some(
    (participant, index) =>
      participant.name.toLowerCase() === name.toLowerCase() && index !== excludeIndex
  );
}

// Função para adicionar um participante
function addParticipant(name) {
  const participants = loadParticipants();
  if (isDuplicateName(participants, name)) {
    alert("Este nome já foi adicionado!");
    return false;
  }
  participants.push({ name, paid: false });
  saveParticipants(participants);
  return true;
}

// Função para editar um participante
function editParticipant(index, name, paid) {
  const participants = loadParticipants();
  if (isDuplicateName(participants, name, index)) {
    alert("Este nome já existe!");
    return false;
  }
  participants[index] = { name, paid };
  saveParticipants(participants);
  return true;
}

// Função para ordenar os participantes por nome
function sortParticipants() {
  const participants = loadParticipants();
  participants.sort((a, b) => a.name.localeCompare(b.name, "pt", { sensitivity: "base" }));
  saveParticipants(participants);
  return participants;
}

// Exporta as funções para uso em outras partes do script
export { loadParticipants, saveParticipants, addParticipant, editParticipant, sortParticipants };
