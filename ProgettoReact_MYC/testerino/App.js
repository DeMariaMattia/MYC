import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { AntDesign } from '@expo/vector-icons';

import Scan from '../testerino/Pagine/Scan';
import Carrello from '../testerino/Pagine/Carrello';
import Catalogo from '../testerino/Pagine/Catalogo';
import Tessera from '../testerino/Pagine/Tessera';
import Ricerca from '../testerino/Pagine/Ricerca';

const Tab = createBottomTabNavigator();
export default function App() {
  return (
    <NavigationContainer>
    <Tab.Navigator
      initialRouteName={"Scan"}
      screenOptions={({ route }) => ({
        tabBarIcon: ({focused, color, size}) => {
          let iconName;
          let rn = route.name;
          if (rn === "Scan") {   
              iconName="scan1";
              return <AntDesign name={"scan1"} size={24} color="red"/>;
          }
           else if (rn === "Carrello") {           
             iconName="shoppingcart"
              return <AntDesign name={iconName} size={24} color="red"/>;        
          }
           else if (rn === "Catalogo") {
              iconName="book";
              return <AntDesign name={iconName} size={24} color="red"/>;
          }
           else if (rn === "Ricerca") {  
              iconName="search1";
              return <AntDesign name={iconName} size={24} color="red"/>;
          } 
           else if (rn === "Tessera") {
              iconName="creditcard";
              return <AntDesign name={iconName} size={24} color="red"/>;
          }
        },
      })}

      tabBarOptions={{
        activeTintColor: 'red',
        inactiveTintColor: 'black',
        labelStyle: { paddingBottom: 0, fontSize: 15 },
        style: { padding: 20, height: 80 }
      }}>

      <Tab.Screen name={"Catalogo"} component={Catalogo} />
      <Tab.Screen name={"Carrello"} component={Carrello} />
      <Tab.Screen name={"Scan"} component={Scan} />
      <Tab.Screen name={"Ricerca"} component={Ricerca} />
      <Tab.Screen name={"Tessera"} component={Tessera} />

    </Tab.Navigator>
  </NavigationContainer>
  );
}
