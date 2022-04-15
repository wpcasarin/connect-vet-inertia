import axios from 'axios';
import { config } from '../../config/axios';

export const getPets = async () => {
  try {
    const resp = await axios.get(`/pets`);
    if (resp.statusText === 'OK') {
      return resp.data;
    } else {
      throw new Error(`HTTP error! status: ${resp.status}`);
    }
  } catch (error) {
    throw error;
  }
};

export const deletePet = async (id) => {
  try {
    const resp = await axios.delete(`/pets/${id}`, config);
    if (resp.statusText === 'OK') {
      return resp;
    } else {
      throw new Error(`HTTP error! status: ${resp.status}`);
    }
  } catch (error) {
    throw error;
  }
};
