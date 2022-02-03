import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import Ionicons from 'react-native-vector-icons/Ionicons';
import { AntDesign } from '@expo/vector-icons'; 
import { MaterialCommunityIcons } from '@expo/vector-icons'; 

// Screens
import Carrello from './Pagine/Carrello';
import Catalogo from './Pagine/Catalogo';
import Scan from './Pagine/Scan';
import Reparti from './Pagine/Reparti';
import Tessera from './Pagine/Tessera';

//Screen names
const scan = "Scan";
const carrello = "Carrello";
const tessera = "Tessera";
const reparti = "Reparti";
const catalogo = "Catalogo";

const Tab = createBottomTabNavigator();

function MainNavigation() {
  return (
    <NavigationContainer>
      <Tab.Navigator
        initialRouteName={scan}
        screenOptions={({ route }) => ({
          tabBarIcon: ({ focused, color, size }) => {
            let iconName;
            let rn = route.name;

            if (rn === scan) {
              iconName = focused ? 'scan1' : 'Scan-outline';

            } else if (rn === carrello) {
              iconName = focused ? 'shoppingcart' : 'Carrello-outline';

            } else if (rn === catalogo) {
              iconName = focused ? 'book' : 'Catalogo-outline';
            }
             else if (rn === reparti) {
            iconName = focused ? 'google-maps' : 'Reparti-outline';
            } else if (rn === tessera) {
            iconName = focused ? 'creditcard' : 'Tessera-outline'
            }
            // You can return any component that you like here!
            return <AntDesign name={iconName} size={24} color="black" />;
          },
        })}
        tabBarOptions={{
          activeTintColor: 'red',
          inactiveTintColor: 'black',
          labelStyle: { paddingBottom: 20, fontSize: 20 },
          style: { padding: 20, height: 80}
        }}>

        <Tab.Screen name={catalogo} component={Catalogo} />
        <Tab.Screen name={carrello} component={Carrello}/>
        <Tab.Screen name={scan} component={Scan} />
        <Tab.Screen name={reparti} component={Reparti} />
        <Tab.Screen name={tessera} component={Tessera} />

      </Tab.Navigator>
    </NavigationContainer>
  );
}

export default MainNavigation;